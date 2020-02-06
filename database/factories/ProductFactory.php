<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
       'category_id'=>rand(1,50),
       'company_id'=>rand(1,50),
       'unit_id'=>rand(1,50),
       'name'=>$faker->word,
       'model'=>$faker->word,
    ];
});
