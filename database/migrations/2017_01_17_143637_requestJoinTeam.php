<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RequestJoinTeam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requestJoinTeam', function (Blueprint $table) {
            $table->increments('id_request')->index();
            $table->integer('user_id');
            $table->integer('team_id');
            $table->boolean('deliberated')->default(false);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('team_id')->references('id_team')->on('team');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return   void
     */
    public function down()
    {
        Schema::dropIfExists('requestJoinTeam');
    }
}
