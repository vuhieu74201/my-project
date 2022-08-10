<?php

namespace App\Services;

use App\Repositories\OrderProduct\OrderProductRepositoryInterface;

class OrderProductService
{
    protected $orderProductRepository ;

    public function __construct(
        OrderProductRepositoryInterface $orderProductRepository
    ) {
        $this->orderProductRepository = $orderProductRepository;

    }
}
