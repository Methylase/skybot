<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'typicode_id',
        'name',
        'comment',
        'post_id'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
