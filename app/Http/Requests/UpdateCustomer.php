<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateCustomer extends Request
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
            'customer-id' => 'required',
            'customer-first-name' => 'required',
            'customer-primary-phone' => 'required',
            'customer-secondary-phone' => 'unique:customers,primary_phone,secondary_phone',
        ];
    }
}
