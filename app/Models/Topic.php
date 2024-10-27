<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $table = 'topic'; // Sử dụng đúng tên bảng

    protected $fillable = [
        'name',
    ];

    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
