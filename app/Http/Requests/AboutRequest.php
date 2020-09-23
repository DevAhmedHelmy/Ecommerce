<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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

            'image' => validate_image()
        ];
        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.title' => ['required']];
            $rules += [$locale . '.description' => ['required','nullable']];


        }

        return $rules;
    }
}
