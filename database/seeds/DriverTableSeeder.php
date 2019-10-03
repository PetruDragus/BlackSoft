<?php

use App\Driver;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DriverTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Driver::truncate();

        foreach(range(1, 100) as $i) {
            Driver::create([
                'name' => $faker->name,
                'genter' => $faker->email,
                'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'phone' => $faker->phoneNumber,
                'partener_id' => $faker->randomDigit,
                'vehicle_id' => $faker->randomDigit,
                'city' => $faker->randomDigit,
            ]);
        }
    }
}