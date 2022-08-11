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

    public function searchOrder($name = "", $from = null, $to = null)
    {
        $orders = $this->model->where('bill_name', 'LIKE', '%' . $name . '%')
                              ->orWhere('order_code', 'LIKE', '%' . $name . '%')
                              ->orWhereHas('products', function ($q) use ($name)
                                    {
                                        return $q->where('name', 'like', '%' . $name . '%');
                                    })
                              ->orWhereHas('user', function ($q) use ($name)
                                     {
                                         return $q->where('name', 'like', '%' . $name . '%');
                                     });
        if($from != null) {
            $orders->where('created_at', '>=', $from);
        }

        if ($to != null) {
            $orders->where('created_at', '<=', $to);
        }
        return $orders->get();
    }

}
