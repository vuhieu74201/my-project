<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table ='order_product';

    public function Product(): BelongsTo
    {
        return $this->BelongsTo(Product::class);
    }
    public function Order(): BelongsTo
    {
        return $this->BelongsTo(Order::class);
    }
}
