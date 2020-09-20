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


        return view('admin.settings.index', ['title' => trans('admin.settings')]);
    }
    public function update_setting(SettingRequest $request)
    {
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
        $rows = [];
        if($request->social_media)
        {
            $count=1;
            $social = $request->social_media;
            foreach ($social['name'] as $key => $value) {
                $row = [];
                $row['id'] = $count;
                $row['name'] = $value;
                $row['icon'] = $social['icon'][$key];
                $row['url'] = $social['url'][$key];
                $count++;
                $rows[] = $row;
            }
        }
        $data['social_media'] = json_encode($rows);
        Setting::orderBy('id', 'desc')->update($data);
		session()->flash('success', trans('admin.updated_successfully'));
		return redirect(adminUrl('settings'));
    }
}
