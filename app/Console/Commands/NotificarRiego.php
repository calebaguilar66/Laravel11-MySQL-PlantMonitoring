<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\CalendarioRiego;
use App\Models\Notificacion;

class NotificarRiego extends Command
{
    protected $signature = 'riego:notificar';
    protected $description = 'Notifica al usuario cuando es momento de regar';

    public function handle()
    {
        $fechaHoraActual = now();
        $horaActual = now()->format('H:i');

        $riegos = CalendarioRiego::where('fecha', $fechaHoraActual->toDateString())
            ->whereRaw("DATE_FORMAT(hora, '%H:%i') = ?", [$horaActual])
            ->get();

        foreach ($riegos as $riego) {
            Notificacion::create([
                'mensaje' => "¡Es momento de regar! Fecha: {$riego->fecha}, Hora: {$riego->hora}",
                'visto' => false,
            ]);
        }
    }

}
