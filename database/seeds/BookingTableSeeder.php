<?php

use App\Booking;
use Faker\Factory;
use Illuminate\Database\Seeder;

class BookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Booking::truncate();

        foreach(range(1, 250) as $i) {
            Booking::create([
                'pickup_address' => $faker->address,
                'drop_address' => $faker->address,
                'date' => $faker->dateTime($max = 'now', $timezone = null),
                'seats' => $faker->randomDigit,
                'passagers' => $faker->randomDigit,
                'pickup_sign' => $faker->randomDigit,
                'bags' => $faker->randomDigit,
                'price' => $faker->randomDigit,
                'driver_id' => $faker->numberBetween(1, 50),
                'vehicle_id' => $faker->numberBetween(1, 2),
                'customer_id' => $faker->numberBetween(1, 20),
            ]);
        }
    }
}