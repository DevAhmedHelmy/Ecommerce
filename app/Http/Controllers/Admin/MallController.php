<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mall;
use Illuminate\Http\Request;
use App\Http\Requests\MallRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
class MallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $malls = Mall::paginate(10);

        return view('admin.malls.index',['malls'=>$malls,'title' => trans('admin.tradmark_Control')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.malls.create',['title' => trans('admin.create')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MallRequest $request)
    {
        $data = $request->validated();

        if (request()->hasFile('logo')) {
			$data['logo'] = up()->uploadFile([
                'file'        => 'logo',
                'path'        => 'malls',
                'upload_type' => 'single',
                'delete_file' => '',
            ]);
		}

        Mall::create($data);
		session()->flash('success', trans('admin.added_successfully'));
		return redirect(adminUrl('malls'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mall  $mall
     * @return \Illuminate\Http\Response
     */
    public function show(Mall $mall)
    {
        return view('admin.malls.show',['title' => trans('admin.show'), 'mall' => $mall]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mall  $mall
     * @return \Illuminate\Http\Response
     */
    public function edit(Mall $mall)
    {
        return view('admin.malls.edit',['mall' => $mall ,'title' => trans('admin.edit')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mall  $mall
     * @return \Illuminate\Http\Response
     */
    public function update(MallRequest $request, Mall $mall)
    {
        $data = $request->validated();

        if (request()->hasFile('logo')) {
			$data['logo'] = up()->uploadFile([
                'file'        => 'logo',
                'path'        => 'malls',
                'upload_type' => 'single',
                'delete_file' => $mall->logo,
            ]);
		}

        $mall->update($data);
		session()->flash('success', trans('admin.updated_successfully'));
		return redirect(route('admin.malls.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mall  $mall
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mall $mall)
    {
        ($mall->logo) ? Storage::delete($mall->logo) : '';

        $mall->delete();
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect(route('admin.malls.index'));
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
               $mall = Mall::findOrfail($id);
               Storage::delete($mall->logo);
               $mall->delete();
           }

       }else{
               $mall = Mall::findOrfail(request('item'));
               Storage::delete($mall->logo);
               $mall->delete();
       }

       session()->flash('success', trans('admin.deleted_successfully'));
       return redirect(route('admin.malls.index'));
    }
}
