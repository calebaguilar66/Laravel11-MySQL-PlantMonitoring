<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Cache;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FrecuenciaRegistroTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_updates_frequency_in_cache()
    {
        // Simula la solicitud para actualizar la frecuencia
        $response = $this->postJson(route('configurar-frecuencia'), [
            'frecuencia' => 10, // Nueva frecuencia
        ]);

        // Verifica que la respuesta sea una redirección a la página de inicio
        $response->assertRedirect(route('monitoreo.index'));
        $response->assertSessionHas('success', 'Frecuencia actualizada correctamente');

        // Verifica que la frecuencia se guardó en la caché
        $this->assertEquals(10, Cache::get('frecuencia_registro'));
    }
}
