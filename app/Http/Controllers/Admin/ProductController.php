<?php

namespace App\Http\Controllers\Admin;
use App\Models\Country;
use App\Models\Size;
use App\Models\Weight;
use App\Models\Product;
use App\Models\Manufacthrer;
use App\Models\Color;
use App\Models\Tradmark;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\ProductAdditional;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);

        return view('admin.products.index',['products'=>$products,'title' => trans('admin.products')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::with('malls')->get();
         
        $colors = Color::all();
        $tradmarks = Tradmark::all();
        $manufacthrers = Manufacthrer::all();

        if($product){
            return redirect()->route('admin.products.update',$product->id);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        Product::create($data);
		session()->flash('success', trans('admin.added_successfully'));
		return redirect(adminUrl('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show',['title' => trans('admin.show'), 'product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $countries = Country::with('malls')->get();
        $colors = Color::all();
        $tradmarks = Tradmark::all();
        $manufacthrers = Manufacthrer::all();
        $product->load('product_additionals');
        $product->load('malls');

         
        return view('admin.products.form',[
            'product' => $product ,
            'countries' => $countries,
            'colors' => $colors,
            'tradmarks' => $tradmarks,
            'manufacthrers' => $manufacthrers,   
            'title' => trans('admin.edit')
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $product->update($data);
        if(request('additionals_name') && request('additionals_value'))
        {
            $product_add = ProductAdditional::where('product_id',$product->id)->delete();
            $add_data = [];
            foreach(request('additionals_name') as $key => $value)
            { 
                if($value !== null){
                    $row=[];
                    $row['product_id'] = $product->id;
                    $row['name']  = $value;
                    $row['value'] =  request('additionals_value')[$key];
                    $add_data[]=$row;
                }
            }
            if(!empty($add_data)){
                foreach($add_data as $data){
                    ProductAdditional::create([
                        'name' => $data['name'],
                        'value' => $data['value'],
                        'product_id' => $data['product_id'],
                    ]);
                }
            }  
        }

        if(request('malls'))
        {
           $product->malls()->sync(request('malls'));   
        }
		// session()->flash('success', trans('admin.updated_successfully'));
        // return redirect(route('admin.products.index'));
        return response()->json(['message'=>trans('admin.updated_successfully'),'status'=>true],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        
        if(count($product->files) > 0)
        {
            $product->files()->delete();
            foreach($product->files as $file)
            {
                Storage::delete($file);
            }
        }
        ($product->malls()) ? $product->malls()->detach($product->id) : ''; 
        ($product->product_additionals()) ? $product->product_additionals()->delete() : '';
        Storage::delete($product->photo);
        $product->delete();
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect(route('admin.products.index'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function multiDelete()
    {
       if(is_array(request()->item)){
           foreach (request()->item as $id) {
               $product = Product::findOrfail($id);
               Storage::delete($product->logo);
               $product->delete();
           }

       }else{
               $product = Product::findOrfail(request('item'));
               Storage::delete($product->logo);
               $product->delete();
       }

       session()->flash('success', trans('admin.deleted_successfully'));
       return redirect(route('admin.products.index'));
    }

    /**
     * store image .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upload_images($id)
    {
        

        if (request()->has('files')) {
            
		    up()->uploadFile([
                'file'        => 'files',
                'path'        => 'product/'.$id,
                'upload_type' => 'files',
                'file_type'   => 'product',
                'relation_id' => $id,
            ]);
		}
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_image()
    {
        if (request()->has('product_id')) {
            dd("ajhfkdhdf");
		    up()->delete(request()->product_id);
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_main_image($id)
    {
        $product = Product::findOrfail($id);

        $product->update([
            'photo'=>up()->uploadFile([
                'file'        => 'file',
                'path'        => 'product/'.$id,
                'upload_type' => 'single',
                'delete_file' => $id,
            ])
        ]);
         return response(['status' => true],200);
    }
    public function delete_product_image($id)
    {
        $product = Product::findOrfail($id);
        Storage::delete($product->photo);
        $product->photo = null;
        $product->save();
    }

    public function preapir_weight_size()
    {
        if(request()->ajax() && request()->has('category_id'))
        {
            $cat_list = array_diff(explode(', ',get_parent(request('category_id'))), [request('category_id')]);
            $sizes = Size::listsTranslations('name')
                    ->where('is_public','yes')
                    ->whereIn('category_id',$cat_list)
                    ->orWhere('category_id',(int) request('category_id'))
                    ->pluck('name','id');
             
            $weights = Weight::listsTranslations('name')->pluck('name','id')->toArray();
            $product = Product::findOrfail(request('product_id'));
            return view('admin.products.ajax.size_weight',['sizes' => $sizes, 'product' => $product, 'weights' => $weights])->render();
        }else{
            return trans('admin.choose_category');
        }
    }

}
