<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ColorRequest extends FormRequest
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
            'color_code' => ['required'],
        ];
        foreach (config('translatable.locales') as $locale) {

            $rules += $this->isMethod('post') ? [$locale . '.name' => ['required','unique:color_translations,name']]: [$locale . '.name' => ['required', Rule::unique('color_translations', 'name')->ignore($this->color->id,'color_id')]];
        }
        return $rules;
    }
}
