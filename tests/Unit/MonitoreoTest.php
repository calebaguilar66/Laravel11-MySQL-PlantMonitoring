<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Monitoreo;

class MonitoreoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_monitoreo_entry()
    {
        // Act: Crear un registro en Monitoreo
        Monitoreo::create([
            'humedad' => 85,
            'temperatura' => 22,
        ]);

        // Assert: Verificar que se creó en la base de datos
        $this->assertDatabaseHas('monitoreos', [
            'humedad' => 85,
            'temperatura' => 22,
        ]);
    }
}
