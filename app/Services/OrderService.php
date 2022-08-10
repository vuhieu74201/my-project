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

    public function update(Request $request, $id)
    {
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
