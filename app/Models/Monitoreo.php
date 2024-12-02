<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monitoreo extends Model
{
    protected $table = 'monitoreos';
    protected $fillable = ['humedad', 'temperatura'];
}
