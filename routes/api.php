<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonitoreoControlador;

Route::get('/monitoreo', [MonitoreoControlador::class, 'index']);
