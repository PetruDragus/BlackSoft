<?php

use App\Vehicle;
use Faker\Factory;
use Illuminate\Database\Seeder;

class VehicleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Vehicle::truncate();

        foreach(range(1, 80) as $i) {
            Vehicle::create([
                'make' => "Dacia",
                'model' => "Logan",
                'driver_id' => '1',
                'price' => '2',
                'bussiness_type' => 'First Class',
                'plate' => 'GL 02DRA'
            ]);
        }
    }
}