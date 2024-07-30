<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bitacora;
use App\Models\Paciente;

class BitacoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Asegúrate de que haya pacientes para referenciar
        $pacientes = Paciente::all();

        // Verificar que existan registros en la tabla de pacientes
        if ($pacientes->isEmpty()) {
            $this->command->info('No hay pacientes en la base de datos, por lo que no se pueden crear registros de bitácora.');
            return;
        }

        // Crear registros de bitácora
        foreach ($pacientes as $paciente) {
            Bitacora::create([
                'paciente_id' => $paciente->id,
                'hora_entrada' => now()->format('H:i:s'),
                'fecha_entrega' => now()->format('Y-m-d'),
                'fecha_salida' => now()->addDays(rand(1, 5))->format('Y-m-d'),
                'hora_salida' => now()->addHours(rand(1, 5))->format('H:i:s'),
                'nombre_extractor' => 'Extractor ' . $paciente->id,
                'area' => 'Área ' . $paciente->id,
                'estatus' => rand(0, 1), // 0 o 1 para estatus booleano
            ]);
        }
    }
}
