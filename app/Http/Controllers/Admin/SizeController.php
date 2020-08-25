<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\SizeRequest;
use App\Http\Controllers\Controller;

class SizeController extends Controller
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
        $sizes = Size::paginate(10);

        return view('admin.sizes.index',['sizes'=>$sizes,'title' => trans('admin.sizes')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.sizes.create',['categories' => $categories,'title' => trans('admin.create')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SizeRequest $request)
    {
        $data = $request->validated();

        Size::create($data);
		session()->flash('success', trans('admin.added_successfully'));
		return redirect(adminUrl('sizes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        return view('admin.sizes.show',['title' => trans('admin.show'), 'size' => $size]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        $categories = Category::all();
        return view('admin.sizes.edit',['categories' => $categories,'size' => $size ,'title' => trans('admin.edit')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(SizeRequest $request, Size $size)
    {
        $data = $request->validated();
        $size->update($data);
		session()->flash('success', trans('admin.updated_successfully'));
		return redirect(route('admin.sizes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        $size->delete();
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect(route('admin.sizes.index'));
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
               $size = Size::findOrfail($id);

               $size->delete();
           }

       }else{
               $size = Size::findOrfail(request('item'));

               $size->delete();
       }

       session()->flash('success', trans('admin.deleted_successfully'));
       return redirect(route('admin.colors.index'));
    }
}
