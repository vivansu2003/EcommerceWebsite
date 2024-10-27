<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brand';

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'sort_order',
        'description',
        'created_by',
        'status',
        'image',
    ];
}
