<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\task::class, function (Faker $faker) {
    return [
        // dummy data
        // 'task_name' => $faker->randomDigitNotNull
        'task_name' => $faker->sentence(3)
        // 'task_name' => $faker->name
    ];
});
