<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store_product extends Model
{
    protected $table = 'store_product';

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }

    public function store()
    {
        return $this->belongsTo('App\Store', 'store_id', 'id');
    }
}
