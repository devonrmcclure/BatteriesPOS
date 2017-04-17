<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreRepairOrder extends Request
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
            'call-if-over' => 'required',
            'deposit' => 'required',
            'product' => 'required',
            'model' => 'required',
            'date-code' => 'required_if:call-if-over,date code warranty',
            'condition' => 'required',
            'accessories' => 'required',
            'problem' => 'required'
        ];
    }
}
