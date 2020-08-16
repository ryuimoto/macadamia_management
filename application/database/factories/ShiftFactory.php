<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Shift::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'attendance' => '13:00:00',
        'leaving' => '18:000',
        'date' => 2020-04-06,
    ];
});
