<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tradmark;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TradmarkRequest;
use Storage;
class TradmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tradmarks = Tradmark::paginate(10);

        return view('admin.tradmarks.index',['tradmarks'=>$tradmarks,'title' => trans('admin.tradmarks')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tradmarks.create',['title' => trans('admin.create')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TradmarkRequest $request)
    {
        $data = $request->validated();

        if (request()->hasFile('logo')) {
			$data['logo'] = up()->uploadFile([
                'file'        => 'logo',
                'path'        => 'tradmarks',
                'upload_type' => 'single',
                'delete_file' => '',
            ]);
		}

        Tradmark::create($data);
		session()->flash('success', trans('admin.added_successfully'));
		return redirect(adminUrl('tradmarks'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tradmark  $tradmark
     * @return \Illuminate\Http\Response
     */
    public function show(Tradmark $tradmark)
    {
        return view('admin.tradmarks.show',['title' => trans('admin.show'), 'tradmark' => $tradmark]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tradmark  $tradmark
     * @return \Illuminate\Http\Response
     */
    public function edit(Tradmark $tradmark)
    {
        return view('admin.tradmarks.edit',['tradmark' => $tradmark ,'title' => trans('admin.edit')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tradmark  $tradmark
     * @return \Illuminate\Http\Response
     */
    public function update(TradmarkRequest $request, Tradmark $tradmark)
    {
        $data = $request->validated();

        if (request()->hasFile('logo')) {
			$data['logo'] = up()->uploadFile([
                'file'        => 'logo',
                'path'        => 'tradmarks',
                'upload_type' => 'single',
                'delete_file' => $tradmark->logo,
            ]);
		}

        $tradmark->update($data);
		session()->flash('success', trans('admin.updated_successfully'));
		return redirect(route('admin.tradmarks.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tradmark  $tradmark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tradmark $tradmark)
    {
        ($tradmark->logo) ? Storage::delete($tradmark->logo) : '';

        $tradmark->delete();
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect(route('admin.tradmarks.index'));
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
               $tradmark = Tradmark::findOrfail($id);
               Storage::delete($tradmark->logo);
               $tradmark->delete();
           }

       }else{
               $tradmark = Tradmark::findOrfail(request('item'));
               Storage::delete($tradmark->logo);
               $tradmark->delete();
       }

       session()->flash('success', trans('admin.deleted_successfully'));
       return redirect(route('admin.tradmarks.index'));
    }
}
