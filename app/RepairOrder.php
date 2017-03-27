<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RepairOrder extends Model
{

    public $timestamps = [
        'to_head_office',
        'from_head_office',
        'customer_pick_up'
    ];

    public function location() {
        return $this->belongsTo('App\User');
    }

    public function customer() {
        return $this->belongsTo('App\Customer');
    }

    public function staff() {
        return $this->belongsTo('App\Staff');
    }
}
