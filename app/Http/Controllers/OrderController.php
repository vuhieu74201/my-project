<?php

namespace App\Http\Controllers;

use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderProduct\OrderProductRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderRepository;
    protected $orderProductRepository;
    protected $customerRepository;
    protected $productRepository;



    public function __construct(
        OrderRepositoryInterface $orderRepository,
        OrderProductRepositoryInterface $orderProductRepository,
        CustomerRepositoryInterface $customerRepository,
        ProductRepositoryInterface $productRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->orderProductRepository = $orderProductRepository;
        $this->customerRepository = $customerRepository;
        $this->productRepository = $productRepository;
    }

    public function index(Request $request)
    {
        $orders = [];
        if ($request->has('name', 'fromDate', 'toDate')) {
            $orders = $this->orderRepository->searchOrder($request->get('name'));
        } else {
            $orders = $this->orderRepository->getAll();
        }
        return view('order.index', compact('orders'));
    }

    public function create()
    {
        $customers = $this->customerRepository->getAll();
        $products = $this->productRepository->getAll();
        return view('order.add',compact('customers','products'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        try {
            $this->orderRepository->create($data);
            $this->orderProductRepository->create($data);
            return redirect()->back()->with('success', 'Add Order Success !');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Add Order Error !');
        }
    }

    public function show($id)
    {
        $order = $this->orderRepository->getListById($id);

        return view('order.show', compact('order'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        try {
            $this->orderRepository->delete($id);
            return redirect()->route('order.index')->with('success', 'Delete Product Success !');
        } catch (\Exception $error) {
            return redirect()->route('order.index')->with('error', 'Delete Product Error !');
        }
    }
}
