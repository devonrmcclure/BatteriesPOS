<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreCustomer extends Request
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
            'customer-first-name' => 'required',
            'customer-primary-phone' => 'required|max:10|unique:customers,primary_phone,secondary_phone',
            'customer-secondary-phone' => 'unique:customers,primary_phone,secondary_phone',
            'customer-province' => 'required',
            'customer-country' => 'required'
        ];
    }
}
