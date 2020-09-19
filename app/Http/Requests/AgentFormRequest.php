<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        if($this->method() == 'PATCH')
        {
            return [
                'first_name' => ['required', 'string', 'max:191'],
                'family_name' => ['required', 'string', 'max:191'],
                'phone_number' => ['required', 'string', 'max:191'],
                'address' => ['required', 'string', 'max:1000'],
                'email' => ['required', 'string', 'email', 'max:191', Rule::unique('agents')->ignore($this->agent->national_id, 'national_id')],
                'password' => ['nullable', 'string', 'min:8', 'confirmed'],
                'avatar' => ['nullable','file','mimetypes:image/*','max:1024'],
            ];
        }

        return [
            'national_id' => ['required', 'string', 'max:191', 'unique:agents'],
            'first_name' => ['required', 'string', 'max:191'],
            'family_name' => ['required', 'string', 'max:191'],
            'phone_number' => ['required', 'string', 'max:191'],
            'address' => ['required', 'string', 'max:1000'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:agents'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' => ['nullable','file','mimetypes:image/*','max:1024'],
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
