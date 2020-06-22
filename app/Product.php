<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
        return $this->belongsTo("App\Category","category_id","id");
    }

    public function detail(){
     return $this->hasOne("App\Detail","product_id","id");
    }
}
