<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function invoice()
    {
        return $this->hasMany('App\Invoice');
    }

    public function location()
    {
    	return $this->belongsTo('App\User');
    }

    public function repair_order() {
        return $this->hasMany('App\RepairOrder');
    }
}
