<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SizeRequest extends FormRequest
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

            'category_id'=>['required','exists:categories,id'],
            'is_public'=>['required','in:yes,no'],

        ];
        foreach (config('translatable.locales') as $locale) {

            $rules += $this->isMethod('post') ? [$locale . '.name' => ['required','unique:size_translations,name']]: [$locale . '.name' => ['required', Rule::unique('size_translations', 'name')->ignore($this->size->id,'size_id')]];


        }
        return $rules;
    }
}
