<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RepairOrder extends Model
{
    public function location() {
        return $this->belongsTo('App\User');
    }

    public function customer() {
        return $this->belongsTo('App\Customer');
    }
}
