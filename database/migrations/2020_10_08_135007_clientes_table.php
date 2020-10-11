<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {

            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('id_usuario', 100);
            $table->integer('telefono');
            $table->string('correo', 100);
            $table->string('direccion', 250);
            $table->integer('nit');

            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }

}
