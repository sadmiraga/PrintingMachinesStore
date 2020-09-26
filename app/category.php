<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function machine()
    {
        return $this->hasMany('App\machine');
    }
}
