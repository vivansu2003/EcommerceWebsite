<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Define the relationship with Brand model
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
