<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notificacion;

class NotificacionController extends Controller
{
    public function ver()
    {
        $notificaciones = Notificacion::where('visto', false)->get();
        

        Notificacion::where('visto', false)->update(['visto' => true]);

        return response()->json($notificaciones);
    }
}
