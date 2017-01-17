<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '2',
            'name' => '1',
            'email' => 'Team 1',
        ]);
        factory(App\User::class, 5)->create();
    }
}
