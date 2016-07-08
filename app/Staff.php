<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public function repair_order() {
        return $this->hasMany('App\RepairOrder');
    }
}
