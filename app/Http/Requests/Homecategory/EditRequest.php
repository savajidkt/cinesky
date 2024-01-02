<?php

namespace App\Http\Requests\Homecategory;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'home_title'             => ['required'],
            'cat_type'        => ['required'],

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
            'home_title.required' => 'Title is required.',
            'cat_type.required' => 'Type is required.',

        ];
    }
}
