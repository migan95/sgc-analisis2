<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_producto' => $this->faker->name,
            'descrip_producto' => $this->faker->lastName,
            'id_proveedor' => $this->faker->numerify('#'),
            'num_existencias' => $this->faker->numerify('######'),
            'precio_productos' => $this->faker->numerify('######.##')
        ];
    }
}
