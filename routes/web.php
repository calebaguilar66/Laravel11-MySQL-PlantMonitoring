<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonitoreoControlador;
use App\Http\Controllers\CalendarioRiegoController;
use App\Http\Controllers\NotificacionController;


Route::get('/', [MonitoreoControlador::class, 'index'])->name('monitoreo.index');
Route::get('/datos', [MonitoreoControlador::class, 'getDatos'])->name('monitoreo.datos');
Route::post('/datos/frecuencia', [MonitoreoControlador::class, 'configurarFrecuencia'])->name('configurar-frecuencia');


Route::get('/calendario-riego', [CalendarioRiegoController::class, 'index'])->name('calendario.index');
Route::post('/calendario-riego', [CalendarioRiegoController::class, 'store'])->name('calendario.store');

Route::get('/notificaciones', [NotificacionController::class, 'ver'])->name('notificaciones.ver');