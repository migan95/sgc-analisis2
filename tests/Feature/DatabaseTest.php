<?php

namespace Tests\Feature;

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




}
