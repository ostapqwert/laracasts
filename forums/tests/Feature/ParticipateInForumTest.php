<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Mockery\Exception;
use Tests\TestCase;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function unauthenticated_users_may_not_add_replies()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $thread = factory('App\Thread')->create();

        $reply = factory('App\Reply')->create();

        $this->post($thread->path().'/replies', $reply->toArray());
    }

    /** @test */
    public function an_auth_user_may_participate_in_forum()
    {
        $this->SignIn();

        $thread = create('App\Thread');

        $reply = make('App\Reply');

      #  dd($thread->path().'/replies');

        $this->post($thread->path().'/replies', $reply->toArray());

       $this->get($thread->path())
           ->assertSee($reply->body);

    }

    /** @test */
    public function unnathenticate_user_may_not_add_replies()
    {

        $this->withExceptionHandling()
            ->post('/threads/some-channel/3/replies', [])
        ->assertRedirect('/login');
    }

    /** @test */
    public function a_replyes_required_a_body()
    {
        $this->withExceptionHandling()->SignIn();

        $thread = create('App\Thread');
        $reply = make('App\Reply', ['body' => null]);

        $this->post($thread->path().'/replies', $reply->toArray())
            ->assertSessionHasErrors('body');
    }

}
