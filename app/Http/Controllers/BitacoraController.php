<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bitacora;
use App\Models\Paciente;

class BitacoraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    /**
     * Mostrar la lista de registros de bitácora.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $enArchivo = Bitacora::with('paciente')
                    ->where('estatus', 0)
                    ->get();

        $fueraArchivo = Bitacora::with('paciente')
                    ->where('estatus', 1)
                    ->get();

        return view('MBitacora.table_bitacoras', compact('enArchivo', 'fueraArchivo'));
    }


    /**
     * Mostrar el formulario para registrar un nuevo registro en la bitácora.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        $pacientes = Paciente::all();
        return view('MBitacora.registro_bitacora', compact('pacientes'));
    }

    /**
     * Almacenar un nuevo registro en la bitácora.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'hora_entrada' => 'nullable|date_format:H:i',
            'fecha_entrega' => 'nullable|date',
            'fecha_salida' => 'nullable|date',
            'hora_salida' => 'nullable|date_format:H:i',
            'nombre_extractor' => 'nullable|string|max:255',
            'area' => 'nullable|string|max:255',
            'estatus' => 'required|boolean',
        ]);

        Bitacora::create($validatedData);

        return redirect()->route('bitacora')->with('success', 'Registro creado con éxito.');
    }
}
