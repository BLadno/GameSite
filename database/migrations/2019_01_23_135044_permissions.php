<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Permissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });
		DB::table('permissions')->insert(['name' => 'user', 'description' => "Zwykły użytkownik"]);
		DB::table('permissions')->insert(['name' => 'mod', 'description' => "Moderator"]);
		DB::table('permissions')->insert(['name' => 'admin', 'description' => "Administrator"]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}

