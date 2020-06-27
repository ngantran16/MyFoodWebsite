<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function products()
    {
        return $this->hasMany('App\Product','id','product_id');
    }

    public function users()
    {
        return $this->hasOne('App\User','id','user_id');
    }
}
