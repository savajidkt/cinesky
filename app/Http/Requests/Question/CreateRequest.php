<?php

namespace App\Http\Requests\Question;

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
            'question'        => ['required'],
            'status'         => ['required'],
            'type'           => ['required'],
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
            'question.required' => 'Question is required.',
            'status.required' => 'Status is required.',
            'type.required' => 'Type is required.'
        ];
    }
}
