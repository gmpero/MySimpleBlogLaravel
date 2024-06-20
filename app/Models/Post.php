<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


/**
 * @method find($id)
 */
class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'posts';
    protected $guarded = false;


    protected function getShortContentAttribute(): string
    {
        return Str::words((string)$this['content'], 10);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

}
