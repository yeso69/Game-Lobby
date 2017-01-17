<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id_game')->index();
            $table->string('name');
            $table->string('logo');
        });


        DB::table('games')->insert(
            array(['name' => 'League of Legends', 'logo' => 'logo_lol.png'], ['name' => 'Rocket League', 'logo' => 'logo_rl.png'], ['name' => 'Counter Strike Global Offensive', 'logo' => 'logo_csgo.png'])
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
