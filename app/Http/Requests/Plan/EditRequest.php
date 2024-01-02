<?php

namespace App\Http\Requests\Plan;

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

            'nameplan'             => ['required'],
            'validity'        => ['required'],
            'description'        => ['required'],
            'price'        => ['required'],
            'discount_price'        => ['required'],

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
            'nameplan.required' => 'plan is required.',
            'validity.required' => 'validity is required.',
            'description.required' => 'description is required.',
            'price.required' => 'price is required.',
            'discount_price.required' => 'discount price is required.',

        ];
    }
}
