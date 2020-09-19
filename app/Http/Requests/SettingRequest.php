<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'logo' => validate_image(),
            'icon' => validate_image(),
            'sitename_ar'=>'',
            'sitename_en'=>'',
            'email'=>'',
            'description'=>'',
            'main_lang'=>'',
            'status' => '',
            'message_maintenance'=>'',
            'social_media' => '',
            'video_url' => '',
            'breadcrumb_img' => validate_image(),
        ];
    }
}
