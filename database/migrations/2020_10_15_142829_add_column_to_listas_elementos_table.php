<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToListasElementosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        //Validamos si existe la tabla
        if (Schema::hasTable('listas_elementos')){
            Schema::table('listas_elementos', function (Blueprint $table) {
                //valido si existe la tabla
            if (!Schema::hasColumn('listas_elementos', 'activo')){
                $table->tinyInteger('activo')->after('lista_tipo_id')->comment('Si está activo=1, Inactivo=2');
            }
            });
        }
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('listas_elementos', function (Blueprint $table) {
            //
        });
    }
}
