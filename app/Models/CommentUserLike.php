<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentUserLike extends Model
{
    use HasFactory;

    protected $table = 'comment_user_likes';
    protected $guarded = false;
}
