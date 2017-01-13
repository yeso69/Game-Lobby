<?php

use Illuminate\Database\Seeder;

class GameLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\GameLevel::class, 5)->create();
    }
}
