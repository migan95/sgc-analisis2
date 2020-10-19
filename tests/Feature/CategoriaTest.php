<?php

namespace Tests\Feature;

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriaTest extends TestCase
{

    use DatabaseMigrations;

    public function testListarCategorias()
    {
        $user = User::factory()->create();
        $item = Categoria::factory()->create();

        $this
            ->actingAs($user)
            ->get('/categorias')
            ->assertSee($item->nombre);
    }

    public function testVerCategoriaAutenticado()
    {
        $user = User::factory()->create();
        $item = Categoria::factory()->create();

        $this
            ->actingAs($user)
            ->get('/categorias/' . $item->id)
            ->assertSee($item->nombre);
    }

    public function testAgregarCategoriaAutenticado()
    {
        $user = User::factory()->create();
        $item = Categoria::factory()->make();

        $this
            ->actingAs($user)
            ->post('/categorias/create/', $item->toArray());

        $this->assertEquals(1, Categoria::all()->count());
    }

    public function testAgregarCategoriaNoAutenticado()
    {
        $item = Categoria::factory()->make();

        $this
            ->post('/categorias/create', $item->toArray())
            ->assertStatus(405);
    }

    public function testCategoriaCamposRequeridos()
    {
        $user = User::factory()->create();
        $item = Categoria::factory()->make([
            'nombre' => null
        ]);
        $this
            ->actingAs($user)
            ->post('categorias/create', $item->toArray())
            ->assertSessionHasErrors([
                'nombre'
            ]);
    }

    public function testActualizarCategoriaAutenticado()
    {
        $user = User::factory()->create();
        $item = Categoria::factory()->create(
            ['nombre' => 'Prueba']
        );
        $actualizacion = "Prueba Actualizar Nombre";
        $item->nombre = $actualizacion;
        $this
            ->actingAs($user)
            ->put('/categorias/' . $item->id, $item->toArray());
        $this->assertDatabaseHas(
            'categorias',
            [
                'id' => $item->id,
                'nombre' => $actualizacion
            ]
        );
    }

    public function testActualizarCategoriaNoAutenticado()
    {
        $item = Categoria::factory()->create(
            ['nombre' => 'Prueba']
        );
        $actualizacion = "Prueba Actualizar Nombre";
        $item->nombre = $actualizacion;
        $this
            ->put('/categorias/' . $item->id, $item->toArray())
            ->assertStatus(419);
    }

    public function testBorrarCategoriaAutenticado()
    {
        $user = User::factory()->create();
        $item = Categoria::factory()->make(['nombre' => 'Borrar']);
        $this
            ->actingAs($user)
            ->delete('/categorias/' . $item->id);
        $this->assertDatabaseMissing(
            'categorias',
            [
                'id' => $item->id
            ]
        );
    }

    public function testBorrarCategoriaNoAutenticado()
    {
        $item = Categoria::factory()
            ->make(['nombre' => 'Borrar']);
        $this
            ->delete('/categorias/' . $item->id)
            ->assertStatus(405);
    }

}
