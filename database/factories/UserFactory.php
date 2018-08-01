<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
 */

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'id' => $faker->randomNumber(8),
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'tipoVinculo' => 'ALUNOGR'
    ];
});

$factory->state(App\User::class, 'docente', function (Faker $faker) {
    return [
        'tipoVinculo' => 'DOCENTE'
    ];
});

$factory->state(App\User::class, 'admin', function (Faker $faker) {
    return [
        'tipoVinculo' => 'ADMIN'
    ];
});

$factory->state(App\User::class, 'random', function (Faker $faker) {
    $vinculos = getVinculos();
    array_push($vinculos, 'ADMIN');
    return [
        'tipoVinculo' => $faker->randomElement($vinculos)
    ];
});