<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Cotizaciones;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class CotizacionesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cotizaciones::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $producto = Producto::factory()->create();
        $cliente = Cliente::factory()->create();
        return [
            'id_producto' => $producto->id,
            'id_cliente' => $cliente->id,
            'cantidad' => $this->faker->numerify('##'),
            'precio_unitario' => $this->faker->numerify('######.##')
        ];
    }
}
