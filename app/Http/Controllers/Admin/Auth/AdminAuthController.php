<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Admin;
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
        if(admin()->attempt(['email' => request('email'),'password' => request('password')], $remember )) 
        { 
            return redirect('admin'); 
        
        }else{ 
            return redirect(adminUrl('login'))->with('message', __('admin.error'));
        }
    
    }
    public function forgotPassword()
    {
        return view('admin.auth.forgot');
    }

    public function forgotPasswordPost()
    {
        $admin = Admin::where($email, request('email'))->first();
        if(!empty($admin))
        {
            $token = app('auth.password.broker')->createToken($admin);
        }
         
    }


    public function logout()
    {
        admin()->logout();
        return redirect(adminUrl('login'));
    }
}
