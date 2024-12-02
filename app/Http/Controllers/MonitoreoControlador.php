<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monitoreo;
use Illuminate\Support\Facades\Cache;

class MonitoreoControlador extends Controller
{
    
    public function index()
    {
        return view('monitoreo.index');
    }

    public function getDatos()
    {
        $frecuenciaActual = Cache::get('frecuencia_registro', 6);
        $datos = Monitoreo::latest()->take(10)->get(); // Obtiene los últimos 10 registros
        return view('monitoreo.datos', compact('datos', 'frecuenciaActual'));;
    }

    public function configurarFrecuencia(Request $request)
    {
        $request->validate([
            'frecuencia' => 'required|integer|min:1',
        ]);

        $nuevaFrecuencia = $request->input('frecuencia');
        Cache::put('frecuencia_registro', $nuevaFrecuencia); // Guardar en caché

        return redirect()->route('monitoreo.index')->with('success', 'Frecuencia actualizada correctamente');
    }


    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        
    }

    
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
