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

        $startTime = strtotime('08:00');
        $endTime = strtotime('18:00');
        $interval = 30 * 60; 

        for ($i = 0; $i < 50; $i++) {
            $randomTime = rand($startTime, $endTime);
            $roundedTime = $interval * floor($randomTime / $interval);

            DB::table('appointments')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'date' => $faker->dateTimeBetween('2024-07-05', '2024-08-30')->format('Y-m-d'),
                'time' => date('H:i', $roundedTime),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
