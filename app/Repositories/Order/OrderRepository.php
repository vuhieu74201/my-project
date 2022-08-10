<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\BaseRepository;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    public function __construct(Order $order)
    {
        parent::__construct($order);
    }

    public function searchOrder($billName = "", $from = null, $to = null)
    {
        $orders = $this->model->where('bill_name', 'LIKE', '%' . $billName . '%');
        if($from != null) {
            $orders->where('created_at', '>=', $from);
        }

        if ($to != null) {
            $orders->where('created_at', '<=', $to);
        }

        return $orders->get();
    }

}
