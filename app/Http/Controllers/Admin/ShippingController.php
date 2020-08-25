<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Shipping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingRequest;
use Illuminate\Support\Facades\Storage;
class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:admins-list|admins-create|admins-edit|admins-delete', ['only' => ['index','store']]);
        $this->middleware('permission:admins-create', ['only' => ['create','store']]);
        $this->middleware('permission:admins-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:admins-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippings = Shipping::paginate(10);

        return view('admin.shippings.index',['shippings'=>$shippings,'title' => trans('admin.shippings')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('level','company')->get();
        return view('admin.shippings.create',['users'=>$users,'title' => trans('admin.create')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ShippingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShippingRequest $request)
    {
        $data = $request->validated();

        if (request()->hasFile('logo')) {
			$data['logo'] = up()->uploadFile([
                'file'        => 'logo',
                'path'        => 'shippings',
                'upload_type' => 'single',
                'delete_file' => '',
            ]);
		}

        Shipping::create($data);
		session()->flash('success', trans('admin.added_successfully'));
		return redirect(adminUrl('shippings'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function show(Shipping $shipping)
    {
        return view('admin.shippings.show',['title' => trans('admin.show'), 'shipping' => $shipping]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipping $shipping)
    {
        return view('admin.shippings.edit',['shipping' => $shipping ,'title' => trans('admin.edit')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function update(ShippingRequest $request, Shipping $shipping)
    {
        $data = $request->validated();

        if (request()->hasFile('logo')) {
			$data['logo'] = up()->uploadFile([
                'file'        => 'logo',
                'path'        => 'shippings',
                'upload_type' => 'single',
                'delete_file' => '',
            ]);
		}

        $shipping->update($data);
		session()->flash('success', trans('admin.updated_successfully'));
		return redirect(adminUrl('shippings'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipping $shipping)
    {
        ($shipping->logo) ? \Storage::delete($shipping->logo) : '';

        $shipping->delete();
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect(route('admin.shippings.index'));
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
               $shipping = Shipping::findOrfail($id);
               Storage::delete($shipping->logo);
               $shipping->delete();
           }

       }else{
               $shipping = Shipping::findOrfail(request('item'));
               Storage::delete($shipping->logo);
               $shipping->delete();
       }

       session()->flash('success', trans('admin.deleted_successfully'));
       return redirect(route('admin.shippings.index'));
    }
}
