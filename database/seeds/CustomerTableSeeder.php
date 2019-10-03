<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Faker\Factory;
use App\Customer;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Customer::truncate();

        foreach(range(1, 300) as $i) {
            Customer::create([
                'name' => $faker->firstname,
                'email'     => $faker->email,
                'phone'     => $faker->phoneNumber,
            ]);
        }
    }
}
