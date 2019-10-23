<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
use Faker\Generator as Faker;

$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->realText(rand(30,100)),
        'content' => $faker->realText(rand(400,1000)),
        'author_id' => 1,
        'category_id' => rand(1, 3)
    ];
});
