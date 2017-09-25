<?php

namespace App;

use App\Events\UserRegistered;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function posts()
    {
       return $this->hasMany(Post::class);
    }

    public function publish(Post $post)
    {
        $this->posts()->save($post);

//        Post::create([
//            'title' => request('title'),
//            'body' => request('body'),
//            'user_id' => auth()->id()
//        ]);
    }

    public static function register($attributes)
    {
        $user = static::create($attributes);

        event(new UserRegistered($user)); // https://laracasts.com/series/whip-monstrous-code-into-shape/episodes/3?autoplay=true

        return $user;
    }
}
