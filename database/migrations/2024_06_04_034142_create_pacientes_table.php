<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('js');
            $table->string('unidad');
            $table->string('exp');
            $table->string('curp');
            $table->date('fecha_ing');
            $table->string('paterno');
            $table->string('materno');
            $table->string('nombre');
            $table->string('sexo');
            $table->date('fecha_nac');
            $table->string('parent');
            $table->string('colonia');
            $table->string('calle');
            $table->string('numero');
            $table->string('telefono');
            $table->string('seg_pop');
            $table->date('vencimiento_sp');
            $table->boolean('gratuidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
