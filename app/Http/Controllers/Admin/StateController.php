<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Requests\StateRequest;
use App\Http\Controllers\Controller;

class StateController extends Controller
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
        $states = State::with(['country','city'])->paginate(10);

        return view('admin.states.index',['states'=>$states,'title' => trans('admin.states')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(request()->ajax() && request()->has('country_id'))
        {
            return City::where('country_id',request()->country_id)->get();
        }
        $countries = Country::all();

        return view('admin.states.create',
            [
                'countries' => $countries,
                'title' => trans('admin.create')
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StateRequest $request)
    {
        $data = $request->validated();
        State::create($data);
		session()->flash('success', trans('admin.added_successfully'));
		return redirect(route('admin.states.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        return view('admin.states.show',
            [
                'state' => $state,
                'title' => trans('admin.show')
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        $countries = Country::all();
        $state->load('city');
        return view('admin.states.edit',
            [
                'countries' => $countries,
                'state' => $state,
                'title' => trans('admin.update')
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(StateRequest $request, State $state)
    {
        $data = $request->validated();
        $state->update($data);
		session()->flash('success', trans('admin.updated_successfully'));
		return redirect(route('admin.states.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $state->delete();
        session()->flash('success', trans('admin.deleted_successfully'));
		return redirect(route('admin.states.index'));
    }

    public function multiDelete()
    {
        if(is_array(request()->item)){
            State::destroy(request('item'));
        }else{
            State::findOrfail(request('item'))->delete();
        }
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect(route('admin.states.index'));
    }
}
