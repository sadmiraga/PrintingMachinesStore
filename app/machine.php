<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class machine extends Model
{
    public function category()
    {
        return $this->belongsTo('App\category');
    }

    public function subCategory()
    {
        return $this->belongsTo('App\subCategory');
    }

    public function picture()
    {
        return $this->hasMany('App\picture');
    }
}
