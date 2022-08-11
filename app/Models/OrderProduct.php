<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table ='order_product';
    protected $fillable = ['order_id', 'product_id', 'quantity'];

    public function product(): BelongsTo
    {
        return $this->BelongsTo(Product::class);
    }
    public function order(): BelongsTo
    {
        return $this->BelongsTo(Order::class);
    }
}
