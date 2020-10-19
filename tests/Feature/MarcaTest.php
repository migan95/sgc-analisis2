<?php

namespace Tests\Feature;

use App\Models\Marca;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class MarcaTest extends TestCase
{
    use DatabaseMigrations;

    public function testListarMarcas()
    {
        $user = User::factory()->create();
        $item = Marca::factory()->create();

        $this
            ->actingAs($user)
            ->get('/marcas')
            ->assertSee($item->nombre);
    }

    public function testVerMarcaAutenticado()
    {
        $user = User::factory()->create();
        $item = Marca::factory()->create();

        $this
            ->actingAs($user)
            ->get('/marcas/' . $item->id)
            ->assertSee($item->nombre);
    }

    public function testAgregarMarcaAutenticado()
    {
        $user = User::factory()->create();
        $item = Marca::factory()->make();

        $this
            ->actingAs($user)
            ->post('/marcas/create/', $item->toArray());

        $this->assertEquals(1, Marca::all()->count());
    }

    public function testAgregarMarcaNoAutenticado()
    {
        $item = Marca::factory()->make();

        $this
            ->post('/marcas/create', $item->toArray())
            ->assertStatus(405);
    }

    public function testMarcaCamposRequeridos()
    {
        $user = User::factory()->create();
        $item = Marca::factory()->make([
            'nombre' => null,
        ]);
        $this
            ->actingAs($user)
            ->post('marcas/create', $item->toArray())
            ->assertSessionHasErrors([
                'nombre'
            ]);
    }

    public function testActualizarMarcaAutenticado()
    {
        $user = User::factory()->create();
        $item = Marca::factory()->create(
            ['nombre' => 'Prueba']
        );
        $actualizacion = "Prueba Actualizar Nombre";
        $item->nombre = $actualizacion;
        $this
            ->actingAs($user)
            ->put('/marcas/' . $item->id, $item->toArray());
        $this->assertDatabaseHas(
            'marcas',
            [
                'id' => $item->id,
                'nombre' => $actualizacion
            ]
        );
    }

    public function testActualizarMarcaNoAutenticado()
    {
        $item = Marca::factory()->create(
            ['nombre' => 'Prueba']
        );
        $actualizacion = "Prueba Actualizar Nombre";
        $item->nombre = $actualizacion;
        $this
            ->put('/marcas/' . $item->id, $item->toArray())
            ->assertStatus(419);
    }

    public function testBorrarMarcaAutenticado()
    {
        $user = User::factory()->create();
        $item = Marca::factory()->make(['nombre' => 'Borrar']);
        $this
            ->actingAs($user)
            ->delete('/marcas/' . $item->id);
        $this->assertDatabaseMissing(
            'marcas',
            [
                'id' => $item->id
            ]
        );
    }

    public function testBorrarMarcaNoAutenticado()
    {
        $item = Marca::factory()
            ->make(['nombre' => 'Borrar']);
        $this
            ->delete('/marcas/' . $item->id)
            ->assertStatus(405);
    }

}
