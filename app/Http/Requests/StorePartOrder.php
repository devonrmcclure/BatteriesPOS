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
            'make' => 'required',
            'referred-by' => 'required',
            'customer-id' => 'required',
            'item' => 'required',
            'model' => 'required',
            'part-number' => 'required',
            'pick-up-location' => 'required',
        ];
    }
}
