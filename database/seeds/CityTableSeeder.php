<?php

use App\City;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        City::truncate();

        foreach(range(1, 100) as $i) {
            City::create([
                'name' => $faker->city,
                'country' => $faker->country,
            ]);
        }
    }
}