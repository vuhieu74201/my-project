<?php

namespace App\Http\Controllers;

use App\Repositories\Customer\CustomerRepositoryInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index(Request $request)
    {
        if($request->has('name')) {
            $customers = $this->customerRepository->search($request->get('name'));
        }
        else {
            $customers = $this->customerRepository->getAll();

        }
        return view('customer.index', compact('customers'));
    }

    public function show($id)
    {
        $customer = $this->customerRepository->getListById($id);
        return view('customer.show', compact('customer'));
    }

    public function destroy($id)
    {
        try {
            $this->customerRepository->delete($id);
            return redirect()->route('customer.index')->with('success', 'Delete Category Success !');
        } catch (\Exception $error) {
            return redirect()->route('customer.index')->with('error', 'Delete Category Error !');
        }
    }

}
