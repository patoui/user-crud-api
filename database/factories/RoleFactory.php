<?php

use App\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'label' => 'Public User',
    ];
});

$factory->state(Role::class, 'admin', function (Faker $faker) {
    return [
        'label' => 'Admin',
    ];
});

$factory->state(Role::class, 'publisher', function (Faker $faker) {
    return [
        'label' => 'Publisher',
    ];
});

$factory->state(Role::class, 'public-user', function (Faker $faker) {
    return [
        'label' => 'Public User',
    ];
});
