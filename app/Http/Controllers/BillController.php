<?php

namespace App\Http\Controllers;

use App\Http\Services\BillService;
use Illuminate\Http\Request;

class BillController extends Controller
{
    protected $billService;

    public function __construct(BillService $billService)
    {
        $this->billService = $billService;
    }

    public function getAll()
    {
        $bills = $this->billService->getAll();
        return view('bill.list',compact('bills'));
    }

    public function showDetail($id)
    {
        $bill = $this->billService->findById($id);
        return view('bill.detail',compact('bill'));
    }
}
