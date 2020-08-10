<?php

namespace App\Http\Controllers\Admin;

use App\Models\Manufacthrer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManufacthrerRequest;
use Storage;
class ManufacthrerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufacthrers = Manufacthrer::paginate(10);

        return view('admin.manufacthrers.index',['manufacthrers'=>$manufacthrers,'title' => trans('admin.tradmark_Control')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manufacthrers.create',['title' => trans('admin.create')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManufacthrerRequest $request)
    {
        $data = $request->validated();

        if (request()->hasFile('logo')) {
			$data['logo'] = up()->uploadFile([
                'file'        => 'logo',
                'path'        => 'manufacthrers',
                'upload_type' => 'single',
                'delete_file' => '',
            ]);
		}

        Manufacthrer::create($data);
		session()->flash('success', trans('admin.added_successfully'));
		return redirect(adminUrl('manufacthrers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manufacthrer  $manufacthrer
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacthrer $manufacthrer)
    {
        return view('admin.manufacthrers.show',['title' => trans('admin.show'), 'manufacthrer' => $manufacthrer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manufacthrer  $manufacthrer
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacthrer $manufacthrer)
    {
        return view('admin.manufacthrers.edit',['manufacthrer' => $manufacthrer ,'title' => trans('admin.edit')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manufacthrer  $manufacthrer
     * @return \Illuminate\Http\Response
     */
    public function update(ManufacthrerRequest $request, Manufacthrer $manufacthrer)
    {
        $data = $request->validated();

        if (request()->hasFile('logo')) {
			$data['logo'] = up()->uploadFile([
                'file'        => 'logo',
                'path'        => 'manufacthrers',
                'upload_type' => 'single',
                'delete_file' => $manufacthrer->logo,
            ]);
		}

        $manufacthrer->update($data);
		session()->flash('success', trans('admin.updated_successfully'));
		return redirect(route('admin.manufacthrers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manufacthrer  $manufacthrer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacthrer $manufacthrer)
    {
        ($manufacthrer->logo) ? Storage::delete($manufacthrer->logo) : '';

        $manufacthrer->delete();
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect(route('admin.manufacthrers.index'));
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
               $manufacthrer = Manufacthrer::findOrfail($id);
               Storage::delete($manufacthrer->logo);
               $manufacthrer->delete();
           }

       }else{
               $manufacthrer = Manufacthrer::findOrfail(request('item'));
               Storage::delete($manufacthrer->logo);
               $manufacthrer->delete();
       }

       session()->flash('success', trans('admin.deleted_successfully'));
       return redirect(route('admin.manufacthrers.index'));
    }
}
