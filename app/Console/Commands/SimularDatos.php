<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Monitoreo;
use Illuminate\Support\Facades\Cache;

class SimularDatos extends Command
{
    
    protected $signature = 'simulate:sensordata';
    protected $description = 'Simula datos de sensores cada 6 segundos';

    public function handle()
    {

    

        while (true) {
            $humedad = rand(70, 90);
            $temperatura = rand(18, 24);
    
            Monitoreo::create([
                'humedad' => $humedad,
                'temperatura' => $temperatura,
            ]);
    
            $this->info("Datos simulados: Humedad={$humedad}%, Temperatura={$temperatura}°C");
    
            $frecuencia = Cache::get('frecuencia_registro', 6);
            sleep($frecuencia);


        
        }
    
    
        return 0;
    }
}
