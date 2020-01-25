<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;


class SettingController extends Controller
{
    public function index()
    {

        return view('admin.settings.index', ['title' => trans('admin.settings')]);
    }
    public function update_setting()
    {
        $data = $this->validate(request(),[
            'logo' => validate_image(),
            // 'icon' => validate_image()
        ], [],
		[
			'logo' => trans('admin.logo'),
			'icon' => trans('admin.icon')
		]);

        if(request()->hasFile('logo'))
        {
            $data['logo'] = request()->file('logo')->store('settings');
        }

        if(request()->hasFile('icon'))
        {
            $data['icon'] = request()->file('icon')->store('settings');
        }

        Setting::orderBy('id', 'desc')->update($data);
		session()->flash('success', trans('admin.updated_record'));
		return redirect(adminUrl('settings'));
    }
}
