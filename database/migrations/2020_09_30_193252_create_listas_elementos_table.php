<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListasElementosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listas_elementos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 150)->comment('nombre del elemento');
            $table->text('descripcion')->comment('breve descripcion para el elemento creado');
            $table->integer('prv_lista_tipo_id')->unsigned()->comment('referencia al tipo de lista que pertenece el elemento');
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
        Schema::dropIfExists('listas_elementos');
    }
}
