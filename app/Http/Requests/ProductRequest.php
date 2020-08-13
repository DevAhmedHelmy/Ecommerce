<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'photo' => validate_image(),
            'category_id' => ['sometimes','nullable'],
            'tradmark_id' => ['sometimes','nullable'],
            'manufacthrer_id' => ['sometimes','nullable'],
            'main_color' => ['sometimes','nullable'],
            'weight' => ['sometimes','nullable'],
            'color_id' => ['sometimes','nullable'],
            'size_id' => ['sometimes','nullable'],
            'stock' => ['sometimes','nullable'],
            'price' => ['sometimes','nullable'],
            'currency_id' => ['sometimes','nullable'],
            'status' => ['sometimes','nullable'],
            'refused_reason' => ['sometimes','nullable'],
            'start_at' => ['sometimes','nullable'],
            'end_at' => ['sometimes','nullable'],
            'start_offer_at' => ['sometimes','nullable'],
            'end_offer_at' => ['sometimes','nullable'],
            'offer_price' => ['sometimes','nullable'],

            'additionals' => ['sometimes','nullable'],
            'malls' => ['sometimes','nullable'],

        ];
        foreach (config('translatable.locales') as $locale) {

            $rules += $this->isMethod('post') ? [$locale . '.name' => ['required','unique:product_translations,name']]: [$locale . '.name' => ['required', Rule::unique('product_translations', 'name')->ignore($this->product->id,'product_id')]];
            $rules +=  [$locale . '.content' => ['required']];

        }
        return $rules;
    }
}
