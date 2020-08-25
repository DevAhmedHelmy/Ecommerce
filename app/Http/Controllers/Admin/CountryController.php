<?php

namespace App\Http\Controllers\Admin;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\CountryRequest;
use Illuminate\Support\Facades\Storage;

class CountryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:countries-list|countries-create|countries-edit|countries-delete', ['only' => ['index','store']]);
        $this->middleware('permission:countries-create', ['only' => ['create','store']]);
        $this->middleware('permission:countries-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:countries-delete', ['only' => ['destroy']]);
        $this->middleware('permission:countries-multi-delete', ['only' => ['multiDelete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::paginate(10);

        return view('admin.countries.index',['countries'=>$countries,'title' => trans('admin.countries')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.countries.form',['title' => trans('admin.create')]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {


        $data = $request->validated();

        if (request()->hasFile('logo')) {
			$data['logo'] = up()->uploadFile([
                'file'        => 'logo',
                'path'        => 'countries',
                'upload_type' => 'single',
                'delete_file' => '',
            ]);
		}

        Country::create($data);
		session()->flash('success', trans('admin.added_successfully'));
		return redirect(adminUrl('countries'));
    }
    /**
     * Display the specified resource.
     *
     * @param  Country $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {

        return view('admin.countries.show',['title' => trans('admin.show'), 'country' => $country]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Country $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('admin.countries.edit',['country' => $country ,'titleEdit' => trans('admin.edit')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Country $country
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, Country $country)
    {
        $data = $request->validated();

        if (request()->hasFile('logo')) {
			$data['logo'] = up()->uploadFile([
                'file'        => 'logo',
                'path'        => 'countries',
                'upload_type' => 'single',
                'delete_file' => $country->logo,
            ]);
		}

        $country->update($data);
		session()->flash('success', trans('admin.updated_successfully'));
		return redirect(route('admin.countries.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Country $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {

        ($country->logo) ? Storage::delete($country->logo) : '';
        $country->cities()->delete();
        $country->delete();
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect(route('admin.countries.index'));
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
                $country = Country::findOrfail($id);
                Storage::delete($country->logo);
                $country->cities()->delete();
                $country->delete();
            }

        }else{
                $country = Country::findOrfail(request('item'));
                Storage::delete($country->logo);
                $country->cities()->delete();
                $country->delete();
        }

        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect(route('admin.countries.index'));
     }
}
