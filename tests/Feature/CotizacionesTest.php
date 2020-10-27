<?php

namespace Tests\Feature;

use App\Models\Cotizaciones;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CotizacionesTest extends TestCase
{

    use DatabaseMigrations;

    public function testListarCotizacioness()
    {
        $user = User::factory()->create();
        $item = Cotizaciones::factory()->create();

        $this
            ->actingAs($user)
            ->get('/cotizaciones')
            ->assertSee($item->nombre);
    }

    public function testVerCotizacionesAutenticado()
    {
        $user = User::factory()->create();
        $item = Cotizaciones::factory()->create();

        $this
            ->actingAs($user)
            ->get('/cotizaciones/'.$item->id)
            ->assertSee($item->nombre);
    }

    public function testAgregarCotizacionesAutenticado()
    {
        $user = User::factory()->create();
        $item = Cotizaciones::factory()->make();

        $this
            ->actingAs($user)
            ->post('/cotizaciones/create/',$item->toArray());

        $this->assertEquals(1, Cotizaciones::all()->count());
    }

    public function testAgregarCotizacionesNoAutenticado()
    {
        $item = Cotizaciones::factory()->make();

        $this
            ->post('/cotizaciones/create',$item->toArray())
            ->assertStatus(405);
    }

    public function testActualizarCotizacionesAutenticado(){
        $user = User::factory()->create();
        $item = Cotizaciones::factory()->create(
            ['cantidad'=>5]
        );
        $item->cantidad = 5;
        $this
            ->actingAs($user)
            ->put('/cotizaciones/'.$item->id, $item->toArray());
        $this->assertDatabaseHas(
            'cotizaciones',
            [
                'id' => $item->id,
                'nombre' => 5
            ]
        );
    }

    public function testActualizarCotizacionesNoAutenticado(){
        $item = Cotizaciones::factory()->create();
        $this
            ->put('/cotizaciones/'.$item->id, $item->toArray())
            ->assertStatus(419);
    }

    public function testBorrarCotizacionesAutenticado(){
        $user = User::factory()->create();
        $item = Cotizaciones::factory()->make();
        $this
            ->actingAs($user)
            ->delete('/cotizaciones/'.$item->id);
        $this->assertDatabaseMissing(
            'cotizaciones',
            [
                'id' => $item->id
            ]
        );
    }

    public function testBorrarCotizacionesNoAutenticado(){
        $item = Cotizaciones::factory()->create();
        $this
            ->delete('/cotizaciones/'.$item->id)
            ->assertStatus(405);
    }


}
