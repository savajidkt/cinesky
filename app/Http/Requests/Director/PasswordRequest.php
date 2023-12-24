<?php

namespace App\Http\Requests\User;

use App\Rules\MatchOldPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class PasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            //'current_password'      => ['required', new MatchOldPassword],
            'new_password'          => ['required', 'string', 'min:8', 'max:256',Password::min(8)
            ->mixedCase()
            ->letters()
            ->numbers()
            ->symbols()
            ->uncompromised(),],
            'password_confirmation'  => ['required','same:new_password'],
        ];
    }
}
