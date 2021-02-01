<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo')->comment('codigo de la categoría');
            $table->string('nombre')->comment('nombre de la categoria');
            $table->unsignedInteger('tipo_producto_id')->comment('foreing key del tipo de producto');
            $table->unsignedInteger('categoria_id')->comment('id de la categoría padre');
            $table->unsignedInteger('tipo_depreciacion')->comment('tipos de depreciación para esa categoria');
            $table->unsignedInteger('metodo_depreciacion')->comment('método de depreciación para esa categoría');
            $table->decimal('porcentaje_salvamento', 20, 5)->nullable()->comment('porcentaje de salvamento sugerido para los activos fijos de esa categoria');
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
        Schema::dropIfExists('categorias');
    }
}
