<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;
use App\User;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'title' => $faker->name,
        'description' => $faker->text,
        'status' => mt_rand(0, 1)
    ];
});
