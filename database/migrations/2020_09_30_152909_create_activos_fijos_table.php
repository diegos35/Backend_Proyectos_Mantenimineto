<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivosFijosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activos_fijos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('producto_id')->comment('Id del producto');
            $table->string('codigo_unspsc', 25)->comment('Código usnpsc del activo fijo');
            $table->string('codigo_barra', 100)->comment('Código de barras del activo fijo');
            $table->json('imagen')->comment('Imagen del activo fijo');
            $table->string('nombre', 200)->comment('Nombre del activo fijo');
            $table->tinyInteger('compuesto')->comment('¿El activo fijo es compuesto? 1 = Sí, 2 = No');
            $table->integer('compuesto_de')->default(0)->comment('Id del activo fijo padre');
            $table->string('descripcion', 200)->comment('Descripción del activo fijo');
            $table->unsignedInteger('marca_id')->comment('Marca del activo fijo');
            $table->unsignedInteger('unidad_compra_id')->comment('Unidad de compra del activo fijo');
            $table->string('numero_serie', 40)->comment('Número de serie del activo fijo');
            $table->string('modelo', 40)->comment('Modelo del activo fijo');
            $table->decimal('valor_salvamento', 20, 5)->nullable()->comment('Valor del salvamento del activo fijo');
            $table->tinyInteger('porcentaje_salvamento')->nullable()->comment('Porcentaje del salvamento del activo fijo');
            $table->unsignedInteger('estado_activo_fijo')->nullable()->comment('Estado del activo fijo');
            $table->unsignedInteger('bodega_id')->nullable()->comment('Bodega donde se encuentra el activo fijo');
            $table->unsignedInteger('tercero_id')->nullable()->comment('Proveedor del activo fijo');
            $table->string('numero_factura', 40)->nullable()->comment('Número de la factura de la compra del activo fijo');
            $table->date('fecha_factura')->nullable()->comment('Fecha de la factura de la compra del activo fijo');
            $table->decimal('valor_compra', 20, 5)->nullable()->comment('Valor de compra del activo fijo');
            $table->unsignedInteger('metodo_depreciacion')->nullable()->comment('Método de depreciación del activo fijo');
            $table->unsignedInteger('tipo_depreciacion')->nullable()->comment('Tipo de depreciación del activo fijo');
            $table->decimal('deterioro', 20, 5)->nullable()->comment('Valor del deterioro del activo fijo');
            $table->decimal('valor_actual', 20, 5)->nullable()->comment('Valor actual del activo fijo');
            $table->unsignedInteger('vida_util')->nullable()->comment('Vida útil del activo fijo, en meses');
            $table->tinyInteger('activo');
            $table->timestamps();
            $table->softDeletes();
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activos_fijos');
    }
}
