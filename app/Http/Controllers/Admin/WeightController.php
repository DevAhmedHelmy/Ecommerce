<?php

namespace App\Http\Controllers\Admin;

use App\Models\Weight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\WeightRequest;

class WeightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $weights = Weight::paginate(10);

        return view('admin.weights.index',['weights'=>$weights,'title' => trans('admin.weights')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.weights.create',['title' => trans('admin.create')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WeightRequest $request)
    {
        $data = $request->validated();

        Weight::create($data);
		session()->flash('success', trans('admin.added_successfully'));
		return redirect(adminUrl('weights'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function show(Weight $weight)
    {
        return view('admin.weights.show',['title' => trans('admin.show'), 'weight' => $weight]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function edit(Weight $weight)
    {
        return view('admin.weights.edit',['weight' => $weight ,'title' => trans('admin.edit')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function update(WeightRequest $request, Weight $weight)
    {
        $data = $request->validated();
        $weight->update($data);
		session()->flash('success', trans('admin.updated_successfully'));
		return redirect(route('admin.weights.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Weight $weight)
    {
        $weight->delete();
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect(route('admin.weights.index'));
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
               $weight = Weight::findOrfail($id);

               $weight->delete();
           }

       }else{
               $weight = Weight::findOrfail(request('item'));

               $weight->delete();
       }

       session()->flash('success', trans('admin.deleted_successfully'));
       return redirect(route('admin.weights.index'));
    }
}
