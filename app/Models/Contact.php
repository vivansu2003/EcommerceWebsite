<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact'; // Updated table name to plural form

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'content',
        'title',
        'status',
    ];
}
