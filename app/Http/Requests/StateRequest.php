<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StateRequest extends FormRequest
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

            'country_id'=>['required','exists:countries,id'],
            'city_id'=>['required','exists:cities,id']
        ];
        foreach (config('translatable.locales') as $locale) {

            $rules += $this->isMethod('post') ? [$locale . '.name' => ['required','unique:state_translations,name']]: [$locale . '.name' => ['required', Rule::unique('state_translations', 'name')->ignore($this->state->id,'state_id')]];

        }

        return $rules;
    }
}
