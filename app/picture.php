<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class picture extends Model
{
    public function machine()
    {
        return $this->belongsTo('App\machine');
    }
}
