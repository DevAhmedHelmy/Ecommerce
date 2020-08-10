<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class ManufacthrerRequest extends FormRequest
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
            'longitude' => ['sometimes','nullable']


        ];
        foreach (config('translatable.locales') as $locale) {

            $rules += $this->isMethod('post') ? [$locale . '.name' => ['required','unique:manufacthrer_translations,name']]: [$locale . '.name' => ['required', Rule::unique('manufacthrer_translations', 'name')->ignore($this->manufacthrer->id,'manufacthrer_id')]];
            $rules += $this->isMethod('post') ? [$locale . '.contact_name' => ['sometimes','nullable','unique:manufacthrer_translations,contact_name']]: [$locale . '.contact_name' => ['sometimes','nullable', Rule::unique('manufacthrer_translations', 'contact_name')->ignore($this->manufacthrer->id,'manufacthrer_id')]];

        }
        return $rules;
    }
}
