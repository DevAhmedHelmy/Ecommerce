<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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

            'country_id'=>['required','exists:countries,id']
        ];
        foreach (config('translatable.locales') as $locale) {

            $rules += $this->isMethod('post') ? [$locale . '.name' => ['required','unique:city_translations,name']]: [$locale . '.name' => ['required', Rule::unique('city_translations', 'name')->ignore($this->city->id,'city_id')]];

        }

        return $rules;
    }
}
