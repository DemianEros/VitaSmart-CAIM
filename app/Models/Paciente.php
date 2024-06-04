<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'js', 'unidad', 'exp', 'curp', 'fecha_ing', 'paterno', 'materno', 'nombre', 'sexo', 'fecha_nac',
        'parent', 'colonia', 'calle', 'numero', 'telefono', 'seg_pop', 'vencimiento_sp', 'gratuidad'
    ];
}
