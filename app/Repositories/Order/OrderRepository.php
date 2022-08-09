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

    public function searchOrder($billName = "")
    {
        return $this->model->where('bill_name', 'LIKE', '%' . $billName . '%')->get();
    }

}
