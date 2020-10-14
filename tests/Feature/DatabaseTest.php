<?php

namespace Tests\Feature;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DatabaseTest extends TestCase
{


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDBUsuarioPrueba()
    {
        $this->assertDatabaseHas('users',[
            'email' => 'admin@test.com',
        ]);
    }

    public function testDbRolUsuario()
    {
        $user = User::factory()->create([
            'name' => 'PruebaRol',
            'role' => 1
        ]);
        $this->assertDatabaseHas(
            'users',
            $user->toArray()
        );
    }

    public function testDbProducto()
    {
        $producto = Producto::factory()->create([]);
        $this->assertDatabaseHas(
            'productos',
            $producto->toArray()
        );
    }

    public function testDbCategoria()
    {
        $item = Categoria::factory()->create([]);
        $this->assertDatabaseHas(
            'categorias',
            $item->toArray()
        );
    }

    public function testDbMarca()
    {
        $item = Marca::factory()->create([]);
        $this->assertDatabaseHas(
            'marcas',
            $item->toArray()
        );
    }

    public function testDbProveedor()
    {
        $item = Proveedor::factory()->create([]);
        $this->assertDatabaseHas(
            'proveedores',
            $item->toArray()
        );
    }



}
