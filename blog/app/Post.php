<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['title', 'body'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment($body)
    {
        Comment::create([
            'body' => $body,
            'post_id' => $this->id
        ]);
    }
}
