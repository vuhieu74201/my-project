<?php

namespace App\Services;

use App\Repositories\Customer\CustomerRepositoryInterface;
use Illuminate\Http\Request;

class CustomerService
{
    protected $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getAll(Request $request)
    {
        if ($request->has('name')) {
            $customers = $this->customerRepository->search($request->get('name'));
        } else {
            $customers = $this->customerRepository->getAll();

        }
        return $customers;

    }

    public function getListById($id)
    {
        return $this->customerRepository->getListById($id);
    }

    public function delete($id)
    {
        return  $this->customerRepository->delete($id);
    }

}
