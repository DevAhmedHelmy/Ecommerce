<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }
    public function doLogin()
    {
        // dd(request()->all());
        // Hash::make($data['password'])
        // $credentials = [
        //     'email' => request('email'),
        //     'password' => Hash::make(request('password'))
        // ];
        // dd($credentials);
        $remember = request('rememberme') == 1 ? true : false;
        if(auth()->guard('admin')->attempt(['email' => request('email'),'password' => request('password')], $remember )) 
        { 
            return redirect('admin'); 
        
        }else{ 
            return redirect('admin/login')->with('message', __('admin.error'));
        }
    }
}
