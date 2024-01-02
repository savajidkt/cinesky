<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
        $rules = [
            'name'        => ['required'],
            'password'          => ['required', 'min:8', 'same:confirm-password'],
            'confirm-password'  => ['required', 'min:8'],
            'email'             => ['required', 'email', 'unique:tbl_users,email'],
        ];

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Full name is required.',
            'email.required' => 'Email is required.',
            'password.min' => 'Password minimum value should be 8.',
            'password.same' => 'Password does not match with confirm password.',
            'confirm-password.min' => 'Password minimum value should be 8.'
        ];
    }
}
