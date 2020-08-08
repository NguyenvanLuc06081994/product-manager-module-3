<?php


namespace App\Http\Services;


use App\Http\Repositories\StoreRepository;

class StoreService
{
    protected $storeRepository;

    public function __construct(StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }

    public function getAll()
    {
        return $this->storeRepository->getAll();
    }
}
