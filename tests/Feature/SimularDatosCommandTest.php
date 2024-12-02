<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Monitoreo;

class SimularDatosCommandTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_generates_sensor_data()
    {
        // Act: Ejecutar el comando de simulación
        $this->artisan('simulate:sensordata')
             ->expectsOutput('Iniciando simulación de datos de sensores...')
             ->expectsOutputToContain('Datos simulados: Humedad=')
             ->expectsOutput('Simulación de datos detenida.')
             ->assertExitCode(0);

        // Assert: Verificar que se creó un registro en la base de datos
        $this->assertDatabaseCount('monitoreos', 1);
    }
}
