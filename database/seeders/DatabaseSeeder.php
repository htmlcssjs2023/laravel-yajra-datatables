<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $gender = $faker->randomElement(['male', 'female']);
        foreach(range(1, 200) as $index){
           DB::table('students')->insert([
            'name' => $faker->name($gender),
            'email' => $faker->email,
            'username' => $faker->userName,
            'phone' => $faker->phoneNumber,
            'dob' => $faker->date($formate = 'Y-m-d', $max='now')
           ]);
        }
    }
}
