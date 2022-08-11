<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;
use App\Services\OrderService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    protected $customerService;
    protected $productService;
    protected $orderService;

    public function __construct(
        CustomerService $customerService,
        ProductService $productService,
        OrderService $orderService
    ) {
        $this->customerService = $customerService;
        $this->productService = $productService;
        $this->orderService = $orderService;
    }

    public function index(Request $request)
    {
        $orders = $this->orderService->getAll($request);
        return view('order.index', compact('orders'));
    }

    public function create(Request $request)
    {
        $customers = $this->customerService->getAll($request);
        $products = $this->productService->getAll($request);
        return view('order.add', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        try {
            $this->orderService->createOrder($request);
            return redirect()->back()->with('success', 'Add Order Success !');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Add Order Error !');
        }
    }

    public function show($id)
    {
        $order = $this->orderService->getListById($id);
        return view('order.show', compact('order'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->orderService->update($request, $id);
            $this->orderService->getListById($id);
            Session::flash('success', 'Update Status Success !');
            return redirect()->back();
        } catch (\Exception $error) {
            Session::flash('error', 'Update Status Error !');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $this->orderService->delete($id);
            return redirect()->route('order.index')->with('success', 'Delete order Success !');
        } catch (\Exception $error) {
            return redirect()->route('order.index')->with('error', 'Delete order Error !');
        }
    }
}
