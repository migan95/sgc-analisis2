<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            
            $table->integer('id_producto');
            $table->string('nombre_producto', 100);
            $table->string('descrip_producto', 100);
            $table->integer('id_proveedor');
            $table->integer('num_existencias');
            $table->float('precio_productos', 8, 2);
            
            
            
            
        });
}  
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
   

