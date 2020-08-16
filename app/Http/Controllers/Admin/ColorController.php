<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Requests\ColorRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::paginate(10);

        return view('admin.colors.index',['colors'=>$colors,'title' => trans('admin.colors')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.colors.create',['title' => trans('admin.create')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColorRequest $request)
    {
        $data = $request->validated();

        Color::create($data);
		session()->flash('success', trans('admin.added_successfully'));
		return redirect(adminUrl('colors'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        return view('admin.colors.show',['title' => trans('admin.show'), 'color' => $color]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        return view('admin.colors.edit',['color' => $color ,'title' => trans('admin.edit')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(ColorRequest $request, Color $color)
    {
        $data = $request->validated();
        $color->update($data);
		session()->flash('success', trans('admin.updated_successfully'));
		return redirect(route('admin.colors.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        $color->delete();
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect(route('admin.colors.index'));
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
               $color = Color::findOrfail($id);
               Storage::delete($color->logo);
               $color->delete();
           }

       }else{
               $color = Color::findOrfail(request('item'));
               Storage::delete($color->logo);
               $color->delete();
       }

       session()->flash('success', trans('admin.deleted_successfully'));
       return redirect(route('admin.colors.index'));
    }
}
