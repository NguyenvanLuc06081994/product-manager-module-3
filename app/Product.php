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

    public function store_products()
    {
        return $this->hasMany('App\Store_product','product_id','id');
    }

    public function bills()
    {
        return $this->belongsToMany('App\Bill','details','product_id','bill_id');
    }
}
