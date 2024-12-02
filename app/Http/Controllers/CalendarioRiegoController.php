<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalendarioRiego;

class CalendarioRiegoController extends Controller
{
    public function index()
    {
        $calendarios = CalendarioRiego::all(); // Obtiene todos los registros
        return view('calendario.index', compact('calendarios'));
    }

    // Guardar configuración de riego
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
        ]);

        CalendarioRiego::create($validated);

        return redirect()->route('calendario.index')->with('success', 'Horario de riego guardado exitosamente.');
    }
}
