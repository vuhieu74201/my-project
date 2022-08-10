<?php

namespace App\Http\Controllers;

use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerRepository;
    protected $customerService;

    public function __construct(
        CustomerRepositoryInterface $customerRepository,
        CustomerService $customerService
    ) {
        $this->customerRepository = $customerRepository;
        $this->customerService = $customerService;
    }

    public function index(Request $request)
    {
        $customers = $this->customerService->getAll($request);
        return view('customer.index', compact('customers'));
    }

    public function show($id)
    {
        $customer = $this->customerService->getListById($id);
        return view('customer.show', compact('customer'));
    }

    public function destroy($id)
    {
        try {
            $this->customerService->delete($id);
            return redirect()->route('customer.index')->with('success', 'Delete Customer Success !');
        } catch (\Exception $error) {
            return redirect()->route('customer.index')->with('error', 'Delete Customer Error !');
        }
    }

}
