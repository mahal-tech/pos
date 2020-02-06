<?php

use Illuminate\Database\Seeder;

class CustomerTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Customer::class,50)->create();
    }
}
