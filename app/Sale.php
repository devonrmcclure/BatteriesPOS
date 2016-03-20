<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
	    public function invoice()
	    {
	        return $this->belongsTo('App\Invoice');
	    }
}
