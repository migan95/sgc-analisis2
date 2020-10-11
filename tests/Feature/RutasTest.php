<?php

namespace Tests\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RutasTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRutaBase()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testPaginaLoginUp(){
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function testCrudUsersAutenticado()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/users');
        $response->assertStatus(200);
    }

    public function testCrudUsersNoAutenticado()
    {
        $response = $this->get('/users');
        $response->assertStatus(302);
    }
}
