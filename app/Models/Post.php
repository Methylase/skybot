<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'skybot_id',
        'typicode_id',
        'post_title',
        'post_body',
 
    ]; 

    public function skybot()
    {
        return $this->belongsTo(Skybot::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
