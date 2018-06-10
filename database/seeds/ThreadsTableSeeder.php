<?php

use Illuminate\Database\Seeder;

class ThreadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->addRepliesToThreads($this->createThreads());
    }

    /**
     * @return mixed
     */
    public function createThreads()
    {
        $threads = factory(App\Thread::class, 100)->create();
        return $threads;
    }

    /**
     * @param $threads
     */
    public function addRepliesToThreads($threads)
    {
        $threads->each(function ($thread) {
            factory('App\Reply', 10)->create(['thread_id' => $thread->id]);
        });
    }
}
