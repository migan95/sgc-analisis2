<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_proveedor', 100);
            $table->string('direccion_proveedor', 100);
            $table->string('num_tel_proveedor', 100);
            $table->string('correo_proveedor', 100);
            $table->timestamps();
    });

    }

    public function down()
    {
        Schema::dropIfExists('proveedores');
    }

}
