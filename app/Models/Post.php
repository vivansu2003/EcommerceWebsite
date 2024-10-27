<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post'; // Đảm bảo tên bảng đúng

    protected $fillable = [
        'id', 'image', 'topic_id',  'title', 'description', 'status', 'detail', 'created_at', 'created_by',
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
