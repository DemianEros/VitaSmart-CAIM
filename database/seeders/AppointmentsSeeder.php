<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AppointmentsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            DB::table('appointments')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'date' => $faker->dateTimeBetween('2024-07-05', '2024-08-30')->format('Y-m-d'),
                'time' => $faker->time(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
