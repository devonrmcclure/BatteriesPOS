<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Phone;

use App\Http\Requests;

use App\Customer;
use Auth;


class CustomersController extends Controller
{
    public function getCustomerByPhone($phone)
    {
    	$phone = Phone::formatNumber($phone);

    	return json_encode(Auth::User()->customer()->where('primary_phone', $phone)->orWhere('secondary_phone', $phone)->first());
    }
}
