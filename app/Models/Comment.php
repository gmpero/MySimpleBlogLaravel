<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $guarded = false;
    protected $withCount = ['likedUsers'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function likedUsers()
    {
        return $this->belongsToMany(User::class, 'comment_user_likes', 'comment_id', 'user_id');
    }
}
