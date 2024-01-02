<?php

namespace App\Http\Requests\Season;

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
                'season_name'        => ['required'],
                'series_id'        => ['required'],
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
            'season_name.required' => '  name is required.',
            'series_id.required' => 'Series  name is required.',
        ];
    }
}