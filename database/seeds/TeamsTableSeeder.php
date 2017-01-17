<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            'id_team' => '1',
            'id_game' => '1',
            'description' => 'Les Sky-Walkers',
        ]);

        DB::table('teams')->insert([
            'id_team' => '2',
            'id_game' => '1',
            'description' => 'Team 2',
        ]);
    }
}
