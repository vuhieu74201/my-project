<?php

namespace App\Repositories\Customer;

use App\Repositories\BaseRepository;
use App\Models\User;

class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface
{
    public function __construct(User $customer)
    {
        parent::__construct($customer);
    }
}
