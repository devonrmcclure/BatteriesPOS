<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{

    protected $table = 'todo';

    public function location() {
        return $this->belongsTo('App\User');
    }
}
