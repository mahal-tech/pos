<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
       	'name' => 'Comp '.$faker->word,
       	'email' => $faker->email,
       	'description' => $faker->word,
       	'address' => $faker->word,
       	'number' => $faker->unique()->randomNumber($nbDigits = 8)
    ];
});
