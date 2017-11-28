<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateThreadTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function guest_may_not_create_a_thread()
    {
        $this->withExceptionHandling();

        $this->post('threads')
            ->assertRedirect('/login');

        $this->get('threads/create')
            ->assertRedirect('/login');

    }


    /** @test */
    public function an_authenticated_user_can_create_new_thread()
    {
        $this->SignIn();

        $thread = make('App\Thread');

        $response = $this->post('threads', $thread->toArray());

        $this->get($response->headers->get('location'))
            ->assertSee($thread->title)
            ->assertSee($thread->body);


    }
    
    /** @test */
    public function a_thread_requires_a_headers()
    {

        $this->PublishThread(['title' => null])
            ->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_thread_requires_a_body()
    {
        $this->PublishThread(['body' => null])
        ->assertSessionHasErrors('body');
    }
    /** @test */
    public function a_thread_requires_a_channel_id()
    {
        factory('App\Channel')->create();

        $this->PublishThread(['channel_id' => null])
        ->assertSessionHasErrors('channel_id');

        $this->PublishThread(['channel_id' => 9999])
        ->assertSessionHasErrors('channel_id');
    }

    public function PublishThread($overrides)
    {
        $this->withExceptionHandling()->SignIn();

        $thread = make('App\Thread', $overrides);

        return $this->post('threads', $thread->toArray());
    }
}
