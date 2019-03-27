<?php

use Faker\Generator as Faker;

use App\Game;
use App\User;
use App\Comment;

$factory->define(App\Comment::class, function (Faker $faker) {
	$comment = new Comment();
    return [
		'user_id' => rand(1,Game::count()),
		'game_id' => rand(1,User::count()),
        'comment' => $comment->genComment(),
		'created_at' => now(),
		'updated_at' => now(),
    ];
});
