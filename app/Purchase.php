<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function vendorInvoice()
    {
    	return $this->belongsTo('App\VendorInvoice');
    }
}
