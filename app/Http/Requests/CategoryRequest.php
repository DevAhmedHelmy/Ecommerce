<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'parent_id'=>['sometimes','nullable']
        ];
        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required']];
            $rules += [$locale . '.description' => ['sometimes','nullable']];
            $rules += [$locale . '.keywords' => ['sometimes','nullable']];


        }

        return $rules;
    }
}
