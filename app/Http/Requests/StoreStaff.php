<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreStaff extends Request
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
            'staff-repcode' => 'required',
            'staff-first-name' => 'required',
            'staff-primary-phone' => 'required|max:10|unique:staff,primary_phone,secondary_phone',
            'staff-secondary-phone' => 'unique:staff,primary_phone,secondary_phone',
            'staff-province' => 'required',
            'staff-country' => 'required'
        ];
    }
}
