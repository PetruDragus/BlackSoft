<?php

use App\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        User::truncate();

        foreach(range(1, 300) as $i) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'email_verified_at' => $faker->email,
                'password' => $faker->creditCardNumber,
            ]);
        }
    }
}