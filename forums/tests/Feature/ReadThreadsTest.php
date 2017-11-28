<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadThreadsTest extends TestCase
{
    use DatabaseMigrations;

    public $thread;

    public function setUp()
    {
        parent::setUp();

        $this->thread = factory('App\Thread')->create();
    }

    /** @test */
    public function a_user_can_browse_all_threads()
    {

        $this->get('/threads')
            ->assertSee($this->thread->title);

    }

    /** @test */
    public function a_user_can_browse_a_single_thread()
    {
        $this->get($this->thread->path())
            ->assertSee($this->thread->title);
    }

    /** @test */
    public function a_user_can_read_replies_associated_whith_this_thread()
    {
        $reply = factory('App\Reply')->create(['thread_id' => $this->thread->id]);

        $this->get($this->thread->path())
            ->assertSee($reply->body);

    }
    
    /** @test */
    public function a_user_can_filter_thread_according_with_a_slug()
    {
        $channel = create('App\Channel');
        $threadInChannel = create('App\Thread', ['channel_id' => $channel->id]);
        $threadNOtInChannel = create('App\Thread') ;


        $this->get('/threads/'.$channel->slug)
            ->assertSee($threadInChannel->body)
            ->assertDontSee($threadNOtInChannel->body);
    }
    
    /** @test */
    public function a_user_can_filter_a_threads_by_username()
    {

        $this->SignIn(create('App\User', ['name' => 'JohnDoe']));

        $threadByJohn = create('App\Thread', ['user_id' => auth()->id()]);
        $threadByNotJohn = create('App\Thread');

        $this->get('/threads?by=JohnDoe')
            ->assertSee($threadByJohn->title)
            ->assertDontSee($threadByNotJohn->title);
    }


}
