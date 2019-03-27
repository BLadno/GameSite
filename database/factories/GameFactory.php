<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

use App\Genre;

$factory->define(App\Game::class, function (Faker $faker) {
	
    return [
        'name' => $faker->name,
        'description' => $faker->text(200,50),
        'release_date' => now(),
        'publisher' => $faker->name,
		'genre_id' => rand(1,Genre::count()),
        'image_url' => '/storage/logo.jpg',
		'created_at' => now(),
		'updated_at' => now(),
    ];
});