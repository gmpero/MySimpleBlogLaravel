<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;
class PostController extends Controller
{
    public function __invoke(Post $post)
    {

        $data = Carbon::parse($post['created_at']);
        return view('post.post', compact('post', 'data'));
    }
}
