<?php

use App\Contact;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Contact::truncate();

        foreach(range(1, 250) as $i) {
            Contact::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'notes' => $faker->text($maxNbChars = 50),
                'phone' => $faker->phoneNumber,
            ]);
        }
    }
}
