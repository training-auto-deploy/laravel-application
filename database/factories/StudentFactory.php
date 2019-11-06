<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Student;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 10),
        'is_first' => 1,
        'code' => Str::random(10),
        'money' => rand(10000, 100000),
        'description' => $faker->paragraphs(15, true)
    ];
});
