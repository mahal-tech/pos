<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'email'=>$faker->email,
        'description'=>$faker->text,
        'address'=>$faker->text,
        'number'=> $faker->unique()->randomNumber($nbDigits = 8),
        'init_balance'=>0,
    ];
});
