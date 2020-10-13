<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->string('sku');
            $table->float('precio_compra', 8, 2);
            $table->integer('id_categoria');
            $table->integer('id_marca');
            $table->string('imagen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropColumn('sku');
            $table->dropColumn('precio_compra');
            $table->dropColumn('id_categoria');
            $table->dropColumn('id_marca');
            $table->dropColumn('imagen');
        });
    }
}
