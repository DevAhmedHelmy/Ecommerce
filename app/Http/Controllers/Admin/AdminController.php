<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\DataTables\AdminsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminsRequest;

class AdminController extends Controller
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
        $admins = Admin::paginate(20);
        return view('admin.admins.index',['admins' => $admins,'title' => trans('admin.admins')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.admins.form',['title' => trans('admin.create_admin')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminsRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($request->password);
        Admin::create($data);
        session()->flash('success', trans('admin.added_successfully'));
        return redirect(route('admin.admins.index'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {

        return view('admin.admins.show',['title' => trans('admin.show_admins'), 'admin' => $admin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('admin.admins.form',['titleEdit' => trans('admin.edit_admin'), 'admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminsRequest $request, Admin $admin)
    {
        $data = $request->validated();
		if ($request->has('password')) {
			$data['password'] = bcrypt(request('password'));
		}
        $admin->update($data);
        session()->flash('success', trans('admin.updated_successfully'));
        return redirect(route('admin.admins.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect(route('admin.admins.index'));
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
            Admin::destroy(request('item'));
        }else{
            Admin::findOrfail(request('item'))->delete();
        }
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect(route('admin.admins.index'));
    }
}
