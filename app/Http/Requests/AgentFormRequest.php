<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgentFormRequest extends FormRequest
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
            'national_id' => ['required', 'string', 'max:191'],
            'first_name' => ['required', 'string', 'max:191'],
            'family_name' => ['required', 'string', 'max:191'],
            'phone_number' => ['required', 'string', 'max:191'],
            'address' => ['required', 'string', 'max:1000'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:agents'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function attributes()
    {
        return [
            'national_id' => 'National ID',
            'first_name' => 'First Name',
            'family_name' => 'Family Name',
            'phone_number' => 'Phone Number',
            'address' => 'Address',
            'email' => 'Email',
            'password' => 'Password'
        ];
    }
}
