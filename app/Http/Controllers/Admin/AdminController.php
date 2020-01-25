<?php

namespace App\Http\Controllers\Admin;
use App\DataTables\AdminsDataTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminsDataTable $admin)
    {
        return $admin->render('admin.admins.index',['title' => trans('admin.Admin_Control')]);
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
    public function store(Request $request)
    {
        $data = $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6'
        ],[],[
            'name' => trans('admin.name'),
            'email' => trans('admin.email'),
            'password' => trans('admin.password'),


        ]);

        $data['password'] = bcrypt($request->password);
        Admin::create($data);
        session()->flash('success', trans('admin.added_successfully'));
        return redirect(route('admin.index'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::findOrfail($id);
        return view('admin.admins.form',['titleEdit' => trans('admin.edit'), 'admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate(request(),
			[
				'name'     => 'required',
				'email'    => 'required|email|unique:admins,email,'.$id,
				'password' => 'sometimes|nullable|min:6'
			], [], [
				'name'     => trans('admin.name'),
				'email'    => trans('admin.email'),
				'password' => trans('admin.password'),
			]);
		if (request()->has('password')) {
			$data['password'] = bcrypt(request('password'));
		}
        Admin::where('id', $id)->update($data);
        session()->flash('success', trans('admin.updated_successfully'));
        return redirect(route('admin.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::findOrfail($id)->delete();
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect(route('admin.index'));
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
            // Admin::whereIn('id', request('item'))->delete();
            // or
            Admin::destroy(request('item'));
        }else{
            Admin::findOrfail(request('item'))->delete();
        }

        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect(route('admin.index'));
     }
}
