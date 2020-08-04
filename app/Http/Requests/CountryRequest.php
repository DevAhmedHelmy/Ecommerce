<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
            'currency'=>'required',
            'iso_code'=>'required',
            'code'=>'required'
        ];
        foreach (config('translatable.locales') as $locale) {

            $rules += $this->isMethod('post') ? [$locale . '.name' => ['required','unique:country_translations,name']]: [$locale . '.name' => ['required', Rule::unique('country_translations', 'name')->ignore($this->country->id,'country_id')]];

        }
        return $rules;
    }
}
