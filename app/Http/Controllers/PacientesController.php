<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paciente;

class PacientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

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

    // Verificar si no se encontraron pacientes
    $noPacientes = $pacientes->isEmpty();

    // Pasar los datos a la vista
    return view('MPacientes.pacientes', compact('pacientes', 'noPacientes'));
}


    public function create()
    {
        return view('MPacientes.crearpacientes');
    }

    public function store(Request $request)
    {
        $request->validate([
            'js' => 'required|string|max:255',
            'unidad' => 'required|string|max:255',
            'exp' => 'required|string|max:255',
            'curp' => 'required|string|max:255',
            'fecha_ing' => 'required|date',
            'paterno' => 'required|string|max:255',
            'materno' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'sexo' => 'required|string|max:1',
            'fecha_nac' => 'required|date',
            'parent' => 'required|string|max:255',
            'colonia' => 'required|string|max:255',
            'calle' => 'required|string|max:255',
            'numero' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'seg_pop' => 'required|string|max:255',
            'vencimiento_sp' => 'required|date',
            'gratuidad' => 'required|boolean',
        ]);

        Paciente::create($request->all());

        return redirect()->route('pacientes')->with('success', 'Paciente creado exitosamente.');
    }

    public function edit(Request $request)
    {
        $id = $request->query('id');
        $paciente = Paciente::findOrFail($id);
        return view('MPacientes.editpacientes', compact('paciente'));
    }

    public function update(Request $request)
    {
        $id = $request->query('id');
        $request->validate([
            'js' => 'required|string|max:255',
            'unidad' => 'required|string|max:255',
            'exp' => 'required|string|max:255',
            'curp' => 'required|string|max:255',
            'fecha_ing' => 'required|date',
            'paterno' => 'required|string|max:255',
            'materno' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'sexo' => 'required|string|max:1',
            'fecha_nac' => 'required|date',
            'parent' => 'required|string|max:255',
            'colonia' => 'required|string|max:255',
            'calle' => 'required|string|max:255',
            'numero' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'seg_pop' => 'required|string|max:255',
            'vencimiento_sp' => 'required|date',
            'gratuidad' => 'required|boolean',
        ]);

        $paciente = Paciente::findOrFail($id);
        $paciente->update($request->all());

        return redirect()->route('pacientes')->with('success', 'Paciente actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->delete();

        return redirect()->route('pacientes')->with('success', 'Paciente eliminado exitosamente.');
    }
}
