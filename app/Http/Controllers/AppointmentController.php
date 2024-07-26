<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $appointments = Appointment::all()->map(function($appointment) {
            return [
                'title' => $appointment->name,
                'start' => $appointment->date . 'T' . $appointment->time,
                'url' => route('appointments.show', ['id' => $appointment->id]),
            ];
        });

        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        return view('appointments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'date' => 'required|date|after_or_equal:' . now()->toDateString(),
            'time' => 'required|date_format:H:i',
        ]);

        $data = $request->only(['name', 'email', 'phone', 'date', 'time']);
        Appointment::create($data);

        return redirect()->route('appointments.index')->with('success', 'La cita fue creada correctamente.');
    }

    public function show(Request $request)
    {
        $appointmentId = $request->query('id');
        $appointment = Appointment::findOrFail($appointmentId);

        return view('appointments.show', compact('appointment'));
    }

    public function edit(Request $request)
    {
        $appointmentId = $request->query('id');
        $appointment = Appointment::findOrFail($appointmentId);

        return view('appointments.edit', compact('appointment'));
    }

    public function update(Request $request)
    {
        $appointmentId = $request->query('id');
        $appointment = Appointment::findOrFail($appointmentId);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'date' => 'required|date|after_or_equal:' . now()->toDateString(),
            'time' => 'required|date_format:H:i',
        ]);

        $data = $request->only(['name', 'email', 'phone', 'date', 'time']);
        $appointment->update($data);

        return redirect()->route('appointments.index')->with('success', 'La cita fue actualizada correctamente.');
    }

    public function destroy(Request $request)
    {
        $appointmentId = $request->query('id');
        $appointment = Appointment::findOrFail($appointmentId);
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'La cita fue eliminada correctamente.');
    }
}


