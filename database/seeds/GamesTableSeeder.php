<?php

use Illuminate\Database\Seeder;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            'name' => 'Counter String GO',
        ]);
        DB::table('games')->insert([
            'name' => 'RocketLeague',
        ]);

        DB::table('games')->insert([
            'name' => 'League Of Legends',
        ]);
    }
}
