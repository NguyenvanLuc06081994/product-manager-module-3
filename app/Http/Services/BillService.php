<?php


namespace App\Http\Services;


use App\Http\Repositories\BillRepository;

class BillService
{
    protected $billRepository;

    public function __construct(BillRepository $billRepository)
    {
        $this->billRepository = $billRepository;
    }

    public function getAll()
    {
        return $this->billRepository->getAll();
    }

    public function findById($id)
    {
        return $this->billRepository->findById($id);
    }
}
