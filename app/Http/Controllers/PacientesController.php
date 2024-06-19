<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paciente;

class PacientesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // Obtener los criterios de búsqueda del formulario
        $searchNombre = $request->input('nombre');
        $searchApellido = $request->input('apellido');
        $searchCurp = $request->input('curp');
        $searchExp = $request->input('exp');
    
        // Inicializar una consulta para todos los pacientes
        $pacientesQuery = Paciente::query();
    
        // Aplicar los criterios de búsqueda a la consulta
        if (!empty($searchNombre)) {
            $pacientesQuery->where('nombre', 'like', '%' . $searchNombre . '%');
        }
        if (!empty($searchApellido)) {
            // Considera buscar tanto en la columna 'paterno' como en 'materno'
            $pacientesQuery->where(function($query) use ($searchApellido) {
                $query->where('paterno', 'like', '%' . $searchApellido . '%')
                    ->orWhere('materno', 'like', '%' . $searchApellido . '%');
            });
        }
        if (!empty($searchCurp)) {
            $pacientesQuery->where('curp', 'like', '%' . $searchCurp . '%');
        }
        if (!empty($searchExp)) {
            $pacientesQuery->where('exp', 'like', '%' . $searchExp . '%');
        }
    
        // Ordenar los pacientes por fecha de ingreso en orden descendente
        $pacientesQuery->orderBy('fecha_ing', 'desc');
    
        // Obtener todos los pacientes que coincidan con los criterios de búsqueda
        $pacientes = $pacientesQuery->get();
    
        // Pasar los datos a la vista
        return view('pacientes', compact('pacientes'));
    }
}
