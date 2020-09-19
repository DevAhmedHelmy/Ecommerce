<?php

namespace App\Http\Controllers\Admin;
use Storage;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;

class SettingController extends Controller
{
    public function index()
    {
        dd(social());

        return view('admin.settings.index', ['title' => trans('admin.settings')]);
    }
    public function update_setting(SettingRequest $request)
    {
        // $data = $this->validate(request(),[
        //     'logo' => validate_image(),
        //     'icon' => validate_image(),
        //     'sitename_ar'=>'',
        //     'sitename_en'=>'',
        //     'email'=>'',
        //     'description'=>'',
        //     'main_lang'=>'',
        //     'status' => '',
        //     'message_maintenance'=>'',
        //     'social_media' => '',
        //     'video_url' => '',
        //     'breadcrumb_img' => validate_image(),
        // ], [],
		// [
		// 	'logo' => trans('admin.logo'),
		// 	'icon' => trans('admin.icon')
		// ]);
        $data = $request->validated();
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
        if(request()->hasFile('breadcrumb_img'))
        {

            $data['breadcrumb_img'] = up()->uploadFile([
                'new_name' => '',
                'file' => 'breadcrumb_img',
                'path' => 'settings',
                'upload_type' =>'single',
                'delete_file' => setting()->breadcrumb_img
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
        if($request->social_media)
        {
            dd($request->social_media);
        }
        Setting::orderBy('id', 'desc')->update($data);
		session()->flash('success', trans('admin.updated_successfully'));
		return redirect(adminUrl('settings'));
    }
}
