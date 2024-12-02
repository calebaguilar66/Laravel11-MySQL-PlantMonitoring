<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\CalendarioRiego;
use App\Models\Notificacion;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();



Artisan::command('riego:notificar', function () {
    $fechaHoraActual = now();
    $horaActual = $fechaHoraActual->format('H:i:s');
    $fechaActual = $fechaHoraActual->toDateString();

    Log::info("Ejecutando comando riego:notificar - Fecha actual: $fechaActual, Hora actual: $horaActual");

    try {
        $riegos = CalendarioRiego::where('fecha', $fechaActual)
            ->where('hora', $horaActual)
            ->get();

        if ($riegos->isEmpty()) {
            Log::info("No se encontraron riegos programados para la fecha y hora actual.");
        }

        foreach ($riegos as $riego) {
            Notificacion::create([
                'mensaje' => "¡Es momento de regar las orquídeas! Fecha: {$riego->fecha}, Hora: {$riego->hora}",
                'visto' => false,
            ]);
            Log::info("Notificación creada para el riego programado: Fecha: {$riego->fecha}, Hora: {$riego->hora}");
        }
    } catch (\Exception $e) {
        Log::error("Error en el comando riego:notificar: " . $e->getMessage());
    }
})->purpose('Notifica al usuario cuando es momento de regar las orquídeas');

Schedule::command('riego:notificar')->everyMinute();


Artisan::command('start-sensor-simulation', function () {
    Artisan::call('simulate:sensordata');
    $this->info('Simulación de sensores iniciada');
})->describe('Inicia la simulación de datos de sensores al iniciar el servidor');