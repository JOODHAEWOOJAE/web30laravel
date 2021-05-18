<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'author_id' => $faker->numberBetween(1,10),
        'title' => $faker->text(40),
        'body' => $faker->text(1000),
        'image' => $faker->imageUrl(750,300)
    ];
});
