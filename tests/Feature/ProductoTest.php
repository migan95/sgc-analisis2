<?php

namespace Tests\Feature;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductoTest extends TestCase
{
    use DatabaseMigrations;

    public function testListarProductos()
    {
        $user = User::factory()->create();
        $item = Producto::factory()->create();

        $this
            ->actingAs($user)
            ->get('/productos')
            ->assertSee($item->nombre_producto);
    }

    public function testVerProductoAutenticado()
    {
        $user = User::factory()->create();
        $item = Producto::factory()->create();

        $this
            ->actingAs($user)
            ->get('/productos/'.$item->id)
            ->assertSee($item->nombre_producto);
    }

    public function testAgregarProductoAutenticado()
    {
        $user = User::factory()->create();
        $item = Producto::factory()->make();

        $this
            ->actingAs($user)
            ->post('/productos/create/',$item->toArray());

        $this->assertEquals(1, Producto::all()->count());
    }

    public function testAgregarProductoNoAutenticado()
    {
        $item = Producto::factory()->make();

        $this
            ->post('/productos/create',$item->toArray())
            ->assertStatus(405);
    }

    public function testProductoCamposRequeridos(){
        $user = User::factory()->create();
        $item = Producto::factory()->make([
            'nombre_producto' => null
        ]);
        $this
            ->actingAs($user)
            ->post('productos/create',$item->toArray())
            ->assertSessionHasErrors([
                'nombre_producto'
            ]);
    }

    public function testActualizarProductoAutenticado(){
        $user = User::factory()->create();
        $item = Producto::factory()->create(
            ['nombre_producto'=>'Prueba']
        );
        $actualizacion = "Prueba Actualizar Nombre";
        $item->nombre_producto = $actualizacion;
        $this
            ->actingAs($user)
            ->put('/productos/'.$item->id, $item->toArray());
        $this->assertDatabaseHas(
            'productos',
            [
                'id' => $item->id,
                'nombre_producto' => $actualizacion
            ]
        );
    }

    public function testActualizarProductoNoAutenticado(){
        $item = Producto::factory()->create(
            ['nombre_producto'=>'Prueba']
        );
        $actualizacion = "Prueba Actualizar Nombre";
        $item->nombre_producto = $actualizacion;
        $this
            ->put('/productos/'.$item->id, $item->toArray())
            ->assertStatus(419);
    }

    public function testBorrarProductoAutenticado(){
        $user = User::factory()->create();
        $item = Producto::factory()->make(['nombre_producto' => 'Borrar']);
        $this
            ->actingAs($user)
            ->delete('/productos/'.$item->id);
        $this->assertDatabaseMissing(
            'productos',
            [
                'id' => $item->id
            ]
        );
    }

    public function testBorrarProductoNoAutenticado(){
        $item = Producto::factory()
            ->make(['nombre_producto' => 'Borrar']);
        $this
            ->delete('/productos/'.$item->id)
            ->assertStatus(405);
    }


}
