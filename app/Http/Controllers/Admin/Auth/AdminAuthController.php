<?php

namespace App\Http\Controllers\Admin\Auth;

use DB;
use App\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\AdminResetPassword;
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
        request()->validate([
			'email' => 'required',
			'password' => 'required',

        ]);

        $remember = request('rememberme') == 1 ? true : false;
        if(admin()->attempt(['email' => request('email'),'password' => request('password')], $remember ))
        {

            return redirect('admin')->with('success', trans('admin.login_successfully'));

        }else{
            return redirect(adminUrl('login'))->with('error', trans('admin.warnning_data'));
        }

    }
    public function forgotPassword()
    {
        return view('admin.auth.forgot');
    }

    public function forgotPasswordPost(Request $request)
    {
        $admin = Admin::where('email',$request->email)->first();
		if (!empty($admin)) {
			$token = app('auth.password.broker')->createToken($admin);
			$data = DB::table('password_resets')->insert([
				'email' => $admin->email,
				'token' => $token,
				'created_at' => Carbon::now(),
			]);
			\Mail::to($admin->email)->send(new AdminResetPassword(['data'=>$admin,'token'=>$token]));
            session()->flash('success', trans('admin.send_successfully'));
			return back();
		}else {
            session()->flash('error', trans('admin.send_failed'));
			return back();
		}

    }

    public function resetWithTokenPassword($token)
	{
		$checkToken = DB::table('password_resets')
						->whereToken($token)
						->where('created_at','>',Carbon::now()->subHour(2))->first();
		if (!empty($checkToken)) {

			return view('admin.auth.resetPassword', compact('checkToken'));
		}else{
			return redirect(adminUrl('forgot/password'));
		}
	}
    public function storeNewPassword($token,Request $request)
	{
        $request->validate([
			'email' => 'required',
			'password' => 'required|confirmed',
			'password_confirmation' => 'required',
		]);
		$checkToken = DB::table('password_resets')
						->whereToken($token)
						->where('created_at','>',Carbon::now()->subHour(2))->first();
        if (!empty($checkToken)) {
            $admin = Admin::where('email', $checkToken->email)
                        ->update([ 'email'=>$checkToken->email, 'password'=>bcrypt($request->password)]);
            DB::table('password_resets')->whereEmail($request->email)->delete();

			admin()->attempt(['email' => $checkToken->email, 'password' => $request->password], true);
            return redirect(adminUrl());
        }else {
			return redirect(adminUrl('forgot/password'));
		}
	}

    public function logout()
    {
        admin()->logout();
        return redirect(adminUrl('login'));
    }
}
