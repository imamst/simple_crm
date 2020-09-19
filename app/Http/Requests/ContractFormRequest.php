<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractFormRequest extends FormRequest
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
            'contract_number' => 'required|string|max:191',
            'tenant_first_name' => 'required|string|max:191',
            'tenant_family_name' => 'required|string|max:191',
            'contract_number' => 'required|string|max:191',
            'tenant_email' => 'required|email|max:191',
            'rent_duration_number' => 'required|numeric',
            'rent_duration_period' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'payment_term' => 'required|string|max:191',
            'contract_file.*' => 'required|file|mimetypes:application/pdf,image/*|max:10000',
        ];
    }

    public function attributes()
    {
        return [
            'contract_number' => 'Contract Number',
            'customer_first_name' => 'Customer First Name',
            'customer_family_name' => 'Customer Family Name',
            'tenant_email' => 'Tenant Email',
            'rent_duration_number' => 'Rent Duration',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'payment_term' => 'Payment Term',
            'contract_file' => 'Contract File'
        ];
    }
}
