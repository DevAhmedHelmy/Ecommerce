<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class ShippingRequest extends FormRequest
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
            'website' => ['sometimes','nullable','url'],
            'phone' => ['sometimes','nullable'],
            'email' => ['sometimes','nullable'],
            'latitude' => ['sometimes','nullable'],
            'longitude' => ['sometimes','nullable'],
            'adddress' => ['sometimes','nullable'],
            'user_id'=>['required','exists:users,id'],

        ];
        foreach (config('translatable.locales') as $locale) {

            $rules += $this->isMethod('post') ? [$locale . '.name' => ['required','unique:shipping_translations,name']]: [$locale . '.name' => ['required', Rule::unique('shipping_translations', 'name')->ignore($this->shipping->id,'shipping_id')]];


        }
        return $rules;
    }
}
