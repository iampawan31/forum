<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReadsThreadsTest extends TestCase
{
    use RefreshDatabase;

    private $thread;

    protected function setUp()
    {
        parent::setUp();

        $this->thread = factory(\App\Thread::class)->create();
    }


    /** @test */
    function a_user_can_view_all_thread()
    {
        $this->get('/threads')
            ->assertSee($this->thread->title);
    }

    /** @test */
    function a_user_can_view_single_thread()
    {
        $this->get($this->thread->path)
            ->assertSee($this->thread->title);
    }

    /** @test */
    function user_can_read_replies_that_are_associated_with_threads()
    {
        $reply = factory('App\Reply')->create(['thread_id' => $this->thread->id]);

        $this->get($this->thread->path)
            ->assertSee($reply->body);
    }
}
