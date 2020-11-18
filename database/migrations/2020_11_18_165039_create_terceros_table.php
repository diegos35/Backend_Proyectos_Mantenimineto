<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTercerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terceros', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tipo_documento_id')->comment('llave foranea de elementos de lista');
            $table->string('numero_documento', 20);
            $table->string('nombre1', 40);
            $table->string('nombre2', 40);
            $table->string('apellido1', 40);
            $table->string('apellido2', 40);
            $table->unsignedInteger('genero_id')->comment('llave foranea de elemento de la lista');
            $table->tinyInteger('activo')->default('1');
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
        Schema::dropIfExists('terceros');
    }
}
