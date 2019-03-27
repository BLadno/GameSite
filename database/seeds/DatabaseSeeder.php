<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
	public function run()
	{
		factory(App\User::class, 20)->create();
		factory(App\Game::class, 20)->create();
		factory(App\Comment::class, 50)->create();
	}
};