<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsablesActivosFijosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsables_activos_fijos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tercero_id')->comment('llave foranea del tercero');
            $table->unsignedInteger('activo_fijo_id')->comment('llave foranea del activo fijo');
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
        Schema::dropIfExists('responsables_activos_fijos');
    }
}
