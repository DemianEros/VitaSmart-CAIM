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

    public function update(Request $request, $type)
{
    $validatedData = $request->validate([
        'expediente' => 'required|string|max:255',
        'hora_entrada' => 'nullable|date_format:H:i',
        'fecha_entrega' => 'nullable|date',
        'fecha_salida' => 'nullable|date',
        'hora_salida' => 'nullable|date_format:H:i',
        'nombre_extractor' => 'nullable|string|max:255',
        'area' => 'nullable|string|max:255',
        'estatus' => 'required|boolean',
    ]);

    \Log::info('Datos recibidos para actualización:', $validatedData); // Añadido para depuración

    $bitacora = Bitacora::whereHas('paciente', function ($query) use ($request) {
        $query->where('exp', $request->expediente);
    })->firstOrFail();

    \Log::info('Registro encontrado:', $bitacora->toArray()); // Añadido para depuración

    $bitacora->update($validatedData);

    return redirect()->route('bitacora')->with('success', 'Registro actualizado con éxito.');
}

}
