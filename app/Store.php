<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Product','store_product','store_id','product_id');
    }
    public function store_products()
    {
        return $this->hasMany('App\Store_product','store_id','id');
    }
}
