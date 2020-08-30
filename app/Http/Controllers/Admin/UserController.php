<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:users-list|users-create|users-edit|users-delete', ['only' => ['index','store']]);
        $this->middleware('permission:users-create', ['only' => ['create','store']]);
        $this->middleware('permission:users-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:users-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::when(request()->level, function($query){
            return $query->where('level',request()->level);
        })->latest()->paginate(20);
        return view('admin.users.index',[
            'title' => trans('admin.users_acounts'),
            'users' => $users
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.form',['title' => trans('admin.create_user')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        $data = $request->validated();
         
        if (request()->hasFile('image')) {
			$data['image'] = up()->uploadFile([
                'file'        => 'image',
                'path'        => 'users',
                'upload_type' => 'single',
                'delete_file' => '',
            ]);
        }

        $data['password'] = bcrypt($request->password);

        User::create($data);
        session()->flash('success', trans('admin.added_successfully'));
        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show',['title' => trans('admin.user_show'), 'user' => $user]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        return view('admin.users.form',['title' => trans('admin.user_edit'), 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();

        if (request()->hasFile('image')) {
			$data['image'] = up()->uploadFile([
                'file'        => 'image',
                'path'        => 'users',
                'upload_type' => 'single',
                'delete_file' => $user->logo,
            ]);
		}
		if (request()->has('password')) {
			$data['password'] = bcrypt(request('password'));
		}
        $user->update($data);
        session()->flash('success', trans('admin.updated_successfully'));
        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(!$user->delete()){
            session()->flash('error', 'error');
        }

        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect(route('admin.users.index'));
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
           User::destroy(request('item'));
       }else{
           User::findOrfail(request('item'))->delete();
       }
       session()->flash('success', trans('admin.deleted_successfully'));
       return redirect(route('admin.users.index'));
    }
}
