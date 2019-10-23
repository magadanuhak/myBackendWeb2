<?php

use Illuminate\Database\Seeder;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Number of posts
        $count = 50;
        factory(\App\Post::class, $count)->create();
    }
}
