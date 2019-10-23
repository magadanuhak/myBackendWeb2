<?php

use Illuminate\Database\Seeder;

class BlogCategoriesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\BlogCategories::class, 3)->create();
    }
}
