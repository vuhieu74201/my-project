<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImport extends Model
{
    use HasFactory;
    protected $table = 'products_import';
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}