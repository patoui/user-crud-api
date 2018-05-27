<?php

use App\Role;
use App\User;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->name,
        'email' => $faker->unique()->safeEmail,
    ];
});

$factory->state(User::class, 'admin', [
    'user_roles_id' => function () {
        return factory(Role::class)->states(['admin'])->create()->id;
    },
]);

$factory->state(User::class, 'public-user', [
    'user_roles_id' => function () {
        return factory(Role::class)->states(['public-user'])->create()->id;
    },
]);
