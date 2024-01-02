<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class DemofromCreateRequest extends FormRequest
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
            'gender'        => ['required'],
            'age'         => ['required'],
            'ethnicity'          => ['required'],
            'job_level'           => ['required'],
            'years'           => ['required']
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
            'gender.required' => 'Please choose one gender option.',
            'age.required' => 'Please choose one age option.',
            'ethnicity.required' => 'Please choose one ethnicity option.',
            'job_level.required' => 'Please choose one job level option.',
            'years.required' => 'Please choose one years option.'
        ];
    }
}
