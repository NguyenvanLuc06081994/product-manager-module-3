<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category','category_id','id');
    }

    public function stores()
    {
        return $this->belongsToMany('App\Store','store_product','product_id','store_id');
    }
}
