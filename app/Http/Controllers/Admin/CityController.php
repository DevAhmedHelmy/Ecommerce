<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Requests\CityRequest;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::with('country')->paginate(10);

        return view('admin.cities.index',['cities'=>$cities,'title' => trans('admin.cities')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('admin.cities.create',['countries' => $countries, 'title' => trans('admin.create')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {

        $data = $request->validated();

        City::create($data);
		session()->flash('success', trans('admin.added_successfully'));
		return redirect(route('admin.cities.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        return view('admin.cities.show',
            [
                'city' => $city,
                'title' => trans('admin.show')
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $countries = Country::all();
        return view('admin.cities.edit',
            [
                'countries' => $countries,
                'city' => $city,
                'title' => trans('admin.update')
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, City $city)
    {
        $data = $request->validated();
        $city->update($data);
		session()->flash('success', trans('admin.updated_successfully'));
		return redirect(route('admin.cities.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        session()->flash('success', trans('admin.deleted_successfully'));
		return redirect(route('admin.cities.index'));
    }
    public function multiDelete()
    {
        if(is_array(request()->item)){
            City::destroy(request('item'));
        }else{
            City::findOrfail(request('item'))->delete();
        }
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect(route('admin.cities.index'));
    }
}
