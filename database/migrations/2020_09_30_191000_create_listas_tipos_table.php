<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListasTiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listas_tipos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50)->comment('nombre para el tipo de lista');
            $table->string('descripcion', 500)->comment('descripcion para el tipo de lista');
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
        Schema::dropIfExists('listas_tipos');
    }
}
