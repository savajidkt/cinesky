<?php

namespace App\Http\Requests\Livechannel;

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

            //'title'        => ['required'],
           // 'channel_id '        => ['required'],
            //'description'        => ['required'],

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
           // 'title.required' => '  name is required.',
           // 'channel_id.required' => 'channel is required.',
           // 'description.required' => '  name is required.',
        ];
    }
}