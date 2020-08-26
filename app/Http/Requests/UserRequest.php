<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UserRequest extends FormRequest
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
            'image' => validate_image(),
            'name'     => ['required','string','max:255'],
            'email'    => $this->isMethod('post') ? ['required','email','unique:users'] :['required','email',Rule::unique('users')->ignore($this->user->id)],
            'password' => $this->isMethod('post') ? ['required','confirmed','min:8'] : ['nullable','min:8'],
            'level'     => ['required',Rule::in(['user','vendor','company'])]
        ];
    }
}
