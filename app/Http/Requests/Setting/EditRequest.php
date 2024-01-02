<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // Define your validation rules for updating settings
        return [
            'app_name.required' => 'title is required.',
            'upi.required' => 'Upi is required.',
            'app_email.required' => 'email is required.',
            'app_version.required' => 'version is required.',
            'app_contact.required' => 'contact is required.',
            'app_description.required' => 'description is required.',
            'app_developed_by.required' => 'developed  is required.',
            'app_privacy_policy.required' => 'privacy policy is required.',
            'app_terms_condition.required' => 'terms is required.',
            'app_refund_policy.required' => 'refund policy is required.',
            // Add other fields and rules as needed
        ];
    }
}
