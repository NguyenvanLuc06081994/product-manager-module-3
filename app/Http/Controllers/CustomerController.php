<?php

namespace App\Http\Controllers;

use App\Http\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function getAll()
    {
        $customers = $this->customerService->getAll();
        return view('customer.list', compact('customers'));
    }

    public function showFormAdd()
    {
        return view('customer.add');
    }

    public function addCustomer(Request $request)
    {
        $this->customerService->addCustomer($request);
        return redirect()->route('customers.list');
    }

    public function showFormEdit($id)
    {
        $customer = $this->customerService->findById($id);
        return view('customer.edit', compact('customer'));
    }

    public function edit(Request $request, $id)
    {
        $this->customerService->edit($request, $id);
        return redirect()->route('customers.list');
    }
}
