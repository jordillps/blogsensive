<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


$factory->define(Post::class, function (Faker $faker) {

    $title = $faker->unique()->sentence($nbWords = 8, $variableNbWords = true);
    $url =  Str::slug($title);

    return [
        //
        'title' => $title,
        'url' => $url,
        'excerpt' => $faker->text($maxNbChars = 200),
        'quote' => $faker->text($maxNbChars = 200),
        'body' => $faker->text($maxNbChars = 2000),
        'published_at' => $faker->date($format = 'Y-m-d', $max = 'now') ,
        'category_id' => $faker->randomDigitNot(0,7,8,9),
        'user_id' =>  $faker->randomElement($array = array (1,2)),
    ];
});
