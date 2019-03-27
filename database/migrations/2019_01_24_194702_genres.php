<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Genres extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Genres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
        });
		DB::table('genres')->insert(['name' => 'Zręcznościowe', 'description' => ""]);
		DB::table('genres')->insert(['name' => 'Przygodowe', 'description' => ""]);
		DB::table('genres')->insert(['name' => 'Fabularne', 'description' => ""]);
		DB::table('genres')->insert(['name' => 'Symulacyjne', 'description' => ""]);
		DB::table('genres')->insert(['name' => 'Strategiczne', 'description' => ""]);
		DB::table('genres')->insert(['name' => 'Logiczne', 'description' => ""]);
		DB::table('genres')->insert(['name' => 'Strzelanki', 'description' => ""]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Genres');
    }
}