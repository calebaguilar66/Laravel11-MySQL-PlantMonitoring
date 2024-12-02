<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalendarioRiego extends Model
{
    protected $table = 'calendario_riego'; // Nombre de la tabla
    protected $fillable = ['fecha', 'hora'];
}
