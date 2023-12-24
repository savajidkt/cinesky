<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class PDFRequest extends FormRequest
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
            'id'        => ['required|number']
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
            'id.required' => 'ID is required.',
            'id.number' => "It's should be number.",
        ];
    }
}
