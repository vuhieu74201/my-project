<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_code',
        'bill_name',
        'status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderProducts(): hasMany
    {
        return $this->hasMany(OrderProduct::class)
                    ->selectRaw( 'product_id , SUM(quantity) as count')
                    ->groupBy('product_id');
    }

    public function products(): belongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

}
