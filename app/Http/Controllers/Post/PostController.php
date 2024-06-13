<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __invoke($id)
    {
        $post = Post::find($id);
        return view('post.post', compact('post'));
    }
}
