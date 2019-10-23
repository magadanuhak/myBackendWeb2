<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(\App\BlogCategories::class, function (Faker $faker) {
    $categories = [
        'Latest',
        'New',
        'Original',
        'Funny',
        'Digest',
        'Tutorial',
        'Informational',
        'Boom',
        'Political',
        'Fake',
        'Science'
        ];
    return [
        'title' => $categories[rand(0,10)]
    ];
});
