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
$factory->define(SGFL\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => substr($faker->name, 0, 20),
        'address' => substr($faker->address, 0, 20),
        'email' => substr($faker->unique()->email,0, 30),
        'designation' => substr($faker->domainName, 0, 20),
        'password' => $password ?: $password = bcrypt('aaaaaa'),
        'remember_token' => str_random(10),
    ];
});
