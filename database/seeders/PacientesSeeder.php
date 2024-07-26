<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PacientesSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            DB::table('pacientes')->insert([
                'js' => $faker->uuid,
                'unidad' => $faker->word,
                'exp' => $faker->randomNumber(5),
                'curp' => $faker->regexify('[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}'),
                'fecha_ing' => $faker->date(),
                'paterno' => $faker->lastName,
                'materno' => $faker->lastName,
                'nombre' => $faker->firstName,
                'sexo' => $faker->randomElement(['M', 'F']),
                'fecha_nac' => $faker->date(),
                'parent' => $faker->word,
                'colonia' => $faker->streetName,
                'calle' => $faker->streetAddress,
                'numero' => $faker->buildingNumber,
                'telefono' => $faker->phoneNumber,
                'seg_pop' => $faker->boolean ? 'SI' : 'NO',
                'vencimiento_sp' => $faker->date(),
                'gratuidad' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
