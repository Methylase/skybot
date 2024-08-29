<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Skybot;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SkybotServiceApiController extends Controller
{
    public function skybots()
    {
        return response()->json(Skybot::paginate(10));
    }

    public function posts($skybotId)
    {
        return response()->json(Post::where('skybot_id', $skybotId)->paginate(10));
    }

    public function comments($postId)
    {
        return response()->json(Comment::where('post_id', $postId)->paginate(10));
    }

}