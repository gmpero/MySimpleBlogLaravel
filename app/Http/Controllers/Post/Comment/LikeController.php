<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\LikeRequest;
use App\Models\Comment;

class LikeController extends Controller
{
    public function __invoke(LikeRequest $request)
    {
//        $comment = Comment::find(1);
//        @dd($comment);

        $data = $request->validated();
//        @dd($data['comment_id']);
        auth()->user()->likedComments()->toggle($data['comment_id']);
        return redirect()->back();
    }
}
