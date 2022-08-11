<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";
    protected $fillable = [
        'id',
        'category_id',
        'name',
        'price',
        'quantity',
        'description',
    ];

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function orders(): belongsToMany
    {
        return $this->belongsToMany(Order::class);
    }

}
