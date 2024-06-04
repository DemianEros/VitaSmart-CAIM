<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all()->map(function($appointment) {
            return [
                'title' => $appointment->name,
                'start' => $appointment->date . 'T' . $appointment->time,
                'url' => route('appointments.show', $appointment->id),
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
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        $data = $request->only(['name', 'email', 'phone', 'date', 'time']);
        Appointment::create($data);

        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
    }

    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    public function edit(Appointment $appointment)
    {
        return view('appointments.edit', compact('appointment'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);
    
        $data = $request->only(['name', 'email', 'phone', 'date', 'time']);
        $appointment->update($data);
    
        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
    }
    


    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }
}
