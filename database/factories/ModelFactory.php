<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'steam' => $faker->unique()->userName,
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Friend::class, function (Faker\Generator $faker) {

    return [
        'user_1' => factory(App\User::class)->create()->id,
        'user_2' => factory(App\User::class)->create()->id,
    ];
});


/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\GameLevel::class, function (Faker\Generator $faker) {

    return [
        'user_id' => factory(App\User::class)->create()->id,
        'game_id' => 1,
        'level' => $faker->randomDigit,
    ];
});


/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\GameLevel::class, function (Faker\Generator $faker) {

    return [
        'user_id' => factory(App\User::class)->create()->id,
        'game_id' => 1,
        'level' => $faker->randomDigit,
    ];
});