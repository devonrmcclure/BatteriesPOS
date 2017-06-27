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

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function associated_sku()
    {
        return $this->hasMany('App\AssociatedSkus', 'sku');
    }
}
