<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{

    use FailedValidation;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        if (request()->has('customers')) {
            return [
                'customers'                 => 'required|array',
                'customers.*.name'          => 'required',
                'customers.*.address'       => 'required',
                'customers.*.code'          => 'nullable|string|max:10',
                'customers.*.contract_date' => 'required|date',
            ];
        } else {
            return [
                "name"          => "required|string|max:127",
                "code"          => "nullable|string|max:10",
                'address'       => 'required',
                "contract_date" => "required|date",
            ];
        }
    }
}
