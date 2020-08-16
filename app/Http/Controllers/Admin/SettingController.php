<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Storage;

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
            'icon' => validate_image(),
            'sitename_ar'=>'',
            'sitename_en'=>'',
            'email'=>'',
            'description'=>'',
            'main_lang'=>'',
            'status' => '',
            'message_maintenance'=>''
        ], [],
		[
			'logo' => trans('admin.logo'),
			'icon' => trans('admin.icon')
		]);

        if(request()->hasFile('logo'))
        {

            $data['logo'] = up()->uploadFile([
                'new_name' => '',
                'file' => 'logo',
                'path' => 'settings',
                'upload_type' =>'single',
                'delete_file' => setting()->logo
            ]);
        }

        if(request()->hasFile('icon'))
        {

            $data['icon'] = up()->uploadFile([
                'new_name' => '',
                'file' => 'icon',
                'path' => 'settings',
                'upload_type' =>'single',
                'delete_file' => setting()->icon
            ]);

        }

        Setting::orderBy('id', 'desc')->update($data);
		session()->flash('success', trans('admin.updated_successfully'));
		return redirect(adminUrl('settings'));
    }
}
