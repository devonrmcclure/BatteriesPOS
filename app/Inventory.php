<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventory';
    protected $primaryKey = 'sku';

    public function qoh()
    {
    	return $this->hasMany('App\Qoh', 'sku');
    }
}
