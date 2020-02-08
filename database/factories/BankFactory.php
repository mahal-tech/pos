<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Bank;
use Faker\Generator as Faker;

$factory->define(Bank::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'account_name'=>'income',
        'account_no'=>$faker->word,
    ];
});
