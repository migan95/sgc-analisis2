<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proveedores')->insert([
            'nombre_proveedor' => 'Proveedor de ejemplo',
            'direccion_proveedor' => 'Direccion de ejemplo',
            'num_tel_proveedor' => '00000000',
            'correo_proveedor' => 'proveedor@test.com'
        ]);
    }
}
