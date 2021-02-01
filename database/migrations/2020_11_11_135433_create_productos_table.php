<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo')->comment('codigo del producto');
            $table->unsignedBigInteger('categoria_id')->comment('id de la categoria a la que pertence el producto');
            $table->string('nombre')->comment('Nombre del producto');
            $table->string('descripcion')->comment('Descripción del producto');
            $table->unsignedBigInteger('unidad_compra_id')->comment('unidad de compra');
            $table->tinyInteger('activo');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
