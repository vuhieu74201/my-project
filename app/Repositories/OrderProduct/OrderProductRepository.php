<?php

namespace App\Repositories\OrderProduct;

use App\Models\OrderProduct;
use App\Repositories\BaseRepository;

class OrderProductRepository extends BaseRepository implements OrderProductRepositoryInterface
{
    public function __construct(OrderProduct $orderProduct)
    {
        parent::__construct($orderProduct);
    }

}
