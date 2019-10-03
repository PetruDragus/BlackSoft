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
        $this->call(CustomerTableSeeder::class);
        $this->call(BookingTableSeeder::class);
        $this->call(ReviewTableSeeder::class);
        $this->call(ContactTableSeeder::class);
        $this->call(DriverTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(InvoiceTableSeeder::class);
    }
}
