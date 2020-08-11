<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Shipping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingRequest;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippings = Shipping::paginate(10);

        return view('admin.shippings.index',['shippings'=>$shippings,'title' => trans('admin.tradmark_Control')]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function show(Shipping $shipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipping $shipping)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipping $shipping)
    {
        //
    }
}
