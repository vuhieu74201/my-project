<?php

namespace App\Services;

use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderProduct\OrderProductRepositoryInterface;
use Illuminate\Http\Request;

class OrderService
{
    protected $orderRepository;
    protected $orderProductRepository;
    protected $customerRepository;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        OrderProductRepositoryInterface $orderProductRepository,
        CustomerRepositoryInterface $customerRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->orderProductRepository = $orderProductRepository;
        $this->customerRepository = $customerRepository;
    }

    public function getAll(Request $request)
    {
        $name = $request->has('name') ? $request->get('name') : "";
        $from = $request->has('fromDate') ? $request->get('fromDate') : null;
        $to = $request->has('toDate') ? $request->get('toDate') : null;

        $orders = $this->orderRepository->searchOrder($name, $from, $to);

        foreach ($orders as $order) {
            $order->sub_total = 0;
            foreach ($order->orderProducts as $orderProduct) {
                $order->sub_total += $orderProduct->Product->price * $orderProduct->count;
            }
        }
        return $orders;
    }

    public function getListById($id)
    {
        return $this->orderRepository->getListById($id);
    }

    public function createOrder($request)
    {
        $order = $this->orderRepository->create([
            'bill_name' => $request['name'],
            'user_id' => $request['user_id'],
            'order_code' => $request['code'],
            'status' => $request['status']
        ]);

        $products = json_decode($request['numOfProduct']);
        foreach($products as $product) {
            $this->orderProductRepository->create([
                'product_id' => $request['product_id_'. $product],
                'quantity' => $request['quantity_' .$product],
                'order_id' => $order->id
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $request->except('_token');
        $data = [
            'status' => $request->input('status'),
        ];
        return $this->orderRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->orderRepository->delete($id);
    }

}
