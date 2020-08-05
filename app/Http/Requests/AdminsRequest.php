<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class AdminsRequest extends FormRequest
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
        return [
            'name'     => ['required','string','max:255'],
            'email'    => $this->isMethod('post') ? ['required','email','unique:admins'] :['required','email',Rule::unique('admins')->ignore($this->admin->id)],
            'password' => $this->isMethod('post') ? ['required','min:8','confirmed'] : ['nullable','min:8','confirmed'],
        ];
    }
}
