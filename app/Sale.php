<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
	/**
	     * Get the customer that owns the invoice.
	     */
	    public function customer()
	    {
	        return $this->belongsTo('App\Customer');
	    }
}
