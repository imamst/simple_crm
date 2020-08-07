<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenantFormRequest extends FormRequest
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
            'phone_number' => 'required|string|max:191',
            'address' => 'required|string',
            'profession' => 'required|string|max:191',
            'company' => 'required|string|max:191',
            'income' => 'required|string|max:191',
            'photo' => 'nullable|file|mimes:jpeg,jpg,bmp,png,webp|max:5000',
        ];
    }

    public function attributes()
    {
        return [
            'phone_number' => 'Phone Number',
            'address' => 'Address',
            'profession' => 'Profession',
            'company' => 'Company',
            'income' => 'Income',
            'photo' => 'Photo',
        ];
    }
}
