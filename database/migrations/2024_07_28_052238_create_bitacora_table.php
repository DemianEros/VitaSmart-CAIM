<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitacoraTable extends Migration
{
    public function up()
    {
        Schema::create('bitacora', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')->constrained('pacientes')->onDelete('cascade');
            $table->time('hora_entrada')->nullable();
            $table->date('fecha_entrega')->nullable();
            $table->date('fecha_salida')->nullable();
            $table->time('hora_salida')->nullable();
            $table->string('nombre_extractor')->nullable();
            $table->string('area')->nullable();
            $table->boolean('estatus')->default(false); // true para "Dentro del archivo", false para "Fuera del archivo"
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bitacora');
    }
}

