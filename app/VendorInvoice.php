<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorInvoice extends Model
{
	public function product()
	{
		return $this->hasMany('App\Purchases');
	}
}
