<?php

namespace Tests\Feature;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ClienteTest extends TestCase
{

    use DatabaseMigrations;

    public function testListarClientes()
    {
        $user = User::factory()->create();
        $item = Cliente::factory()->create();

        $this
            ->actingAs($user)
            ->get('/clientes')
            ->assertSee($item->nombre);
    }

    public function testVerClienteAutenticado()
    {
        $user = User::factory()->create();
        $item = Cliente::factory()->create();

        $this
            ->actingAs($user)
            ->get('/clientes/'.$item->id)
            ->assertSee($item->nombre);
    }

    public function testAgregarClienteAutenticado()
    {
        $user = User::factory()->create();
        $item = Cliente::factory()->make();

        $this
            ->actingAs($user)
            ->post('/clientes/create/',$item->toArray());

        $this->assertEquals(1, Cliente::all()->count());
    }

    public function testAgregarClienteNoAutenticado()
    {
        $item = Cliente::factory()->make();

        $this
            ->post('/clientes/create',$item->toArray())
            ->assertStatus(405);
    }

    public function testClienteCamposRequeridos(){
        $user = User::factory()->create();
        $item = Cliente::factory()->make([
            'nombre' => null,
            'apellido' => null
        ]);
        $this
            ->actingAs($user)
            ->post('clientes/create',$item->toArray())
            ->assertSessionHasErrors([
                'nombre',
                'apellido'
            ]);
    }

    public function testActualizarClienteAutenticado(){
        $user = User::factory()->create();
        $item = Cliente::factory()->create(
            ['nombre'=>'Prueba']
        );
        $actualizacion = "Prueba Actualizar Nombre";
        $item->nombre = $actualizacion;
        $this
            ->actingAs($user)
            ->put('/clientes/'.$item->id, $item->toArray());
        $this->assertDatabaseHas(
                'clientes',
                [
                    'id' => $item->id,
                    'nombre' => $actualizacion
                ]
            );
    }

    public function testActualizarClienteNoAutenticado(){
        $item = Cliente::factory()->create(
            ['nombre'=>'Prueba']
        );
        $actualizacion = "Prueba Actualizar Nombre";
        $item->nombre = $actualizacion;
        $this
            ->put('/clientes/'.$item->id, $item->toArray())
            ->assertStatus(419);
    }

    public function testBorrarClienteAutenticado(){
        $user = User::factory()->create();
        $item = Cliente::factory()->make(['nombre' => 'Borrar']);
        $this
            ->actingAs($user)
            ->delete('/clientes/'.$item->id);
        $this->assertDatabaseMissing(
                'clientes',
                [
                    'id' => $item->id
                ]
            );
    }

    public function testBorrarClienteNoAutenticado(){
        $item = Cliente::factory()
            ->make(['nombre' => 'Borrar']);
        $this
            ->delete('/clientes/'.$item->id)
            ->assertStatus(405);
    }


}
