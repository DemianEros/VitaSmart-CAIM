<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'bitacora';

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'paciente_id',
        'hora_entrada',
        'fecha_entrega',
        'fecha_salida',
        'hora_salida',
        'nombre_extractor',
        'area',
        'estatus',
    ];

    // Relación con el modelo Paciente
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
