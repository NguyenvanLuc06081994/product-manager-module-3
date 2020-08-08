<?php


namespace App\Http\Services;


use App\Customer;
use App\Http\Repositories\CustomerRepository;

class CustomerService
{
    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getAll()
    {
        return $this->customerRepository->getAll();
    }

    public function addCustomer($request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $this->customerRepository->save($customer);
    }

    public function findById($id)
    {
        return $this->customerRepository->findById($id);
    }

    public function edit($request, $id)
    {
        $customer = $this->customerRepository->findById($id);
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $this->customerRepository->save($customer);
    }
}
