<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MallRequest extends FormRequest
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
        $rules=[
            'logo' => validate_image(),
            'facebook' => ['sometimes','nullable','url'],
            'twitter' => ['sometimes','nullable','url'],
            'website' => ['sometimes','nullable','url'],
            'phone' => ['required'],
            'email' => ['required'],
            'latitude' => ['sometimes','nullable'],
            'longitude' => ['sometimes','nullable'],
            'adddress' => ['sometimes','nullable']

        ];
        foreach (config('translatable.locales') as $locale) {

            $rules += $this->isMethod('post') ? [$locale . '.name' => ['required','unique:mall_translations,name']]: [$locale . '.name' => ['required', Rule::unique('mall_translations', 'name')->ignore($this->mall->id,'mall_id')]];


        }
        return $rules;
    }
}
