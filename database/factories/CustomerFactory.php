<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'address'=>$faker->text,
        'number'=> $faker->unique()->randomNumber($nbDigits = 8),
        'email'=>$faker->email,
    ];
});
