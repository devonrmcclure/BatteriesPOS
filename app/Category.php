<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function inventory()
    {
        return $this->hasMany('App\Inventory', 'sku');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'parent_id');
    }
}
