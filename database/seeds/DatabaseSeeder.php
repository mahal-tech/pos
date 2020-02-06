<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoryTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(CustomerTableSeed::class);
        $this->call(ProductTableSeeder::class);
        $this->call(SupplierTableSeeder::class);
        $this->call(UnitTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
