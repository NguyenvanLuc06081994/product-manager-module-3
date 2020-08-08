<?php


namespace App\Http\Repositories;


use App\Store;

class StoreRepository
{
    protected $store;

    public function __construct(Store $store)
    {
        $this->store = $store;
    }

    public function getAll()
    {
        return $this->store->all();
    }
}
