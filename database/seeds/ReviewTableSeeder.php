<?php

use App\Review;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Review::truncate();

        foreach(range(1, 500) as $i) {
            Review::create([
                'review' => $faker->realText($maxNbChars = 200, $indexSize = 2),
                'rating' => $faker->numberBetween(1, 5),
                'booking_id' => $faker->numberBetween(1, 5),
                'driver_id' => $faker->numberBetween(1, 5),
                'customer_name' => $faker->name(),
            ]);
        }
    }
}
