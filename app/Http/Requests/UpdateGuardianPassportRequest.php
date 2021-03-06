<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGuardianPassportRequest extends FormRequest
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
        return [
            'is_cancelled' => 'required',
            'country_id' => 'required',
            'given_name' => 'required',
            'family_name' => 'required',
            'number' => 'required',
            'issue_date' => 'required',
            'expiration_date' => 'required',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        // 'dob' => 'date of birth',
        return [
            'is_cancelled' => 'status',
            'country_id' => 'country',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        // 'dob.required' => 'Your date of birth is required.',
        return [];
    }
}
