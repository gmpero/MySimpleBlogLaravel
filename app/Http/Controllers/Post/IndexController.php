<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::all();
        foreach ($posts as $post)
        {
            $post['created_at'] = Carbon::parse($post['created_at']);
        }
        return view('post.index', compact('posts'));
    }
}
