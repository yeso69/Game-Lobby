<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id_team')->index();
            $table->integer('id_game');
            $table->integer('id_admin');
            $table->string('image')->default('img/nopic.png'); //filename....
            $table->string('description');
            $table->string('name_team');
            $table->foreign('id_game')->references('id_game')->on('games');
            $table->foreign('id_admin')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
