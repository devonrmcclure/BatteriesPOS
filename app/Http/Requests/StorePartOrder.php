<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StorePartOrder extends Request
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
            'referred-by' => 'required',
            'customer-id' => 'required',
            'deposit' => 'required',
            'item' => 'required',
            'model' => 'required',
            'part-number' => 'required',
            'invoice' => 'required',
            'pick-up-location' => 'required',
        ];
    }
}