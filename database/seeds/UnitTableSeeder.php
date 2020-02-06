<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) { 
        	DB::table('units')->insert([
	            'name' => Str::random(10),
	        ]);
        }
    }
}
