<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToResponsablesActivosFijosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
         //Validamos si existe la tabla
        if (Schema::hasTable('responsables_activos_fijos')){
            Schema::table('responsables_activos_fijos', function (Blueprint $table) {
               //valido si existe la tabla
                if (!Schema::hasColumn('responsables_activos_fijos', 'activo')){
                    $table->tinyInteger('activo')->after('activo_fijo_id')->comment('Si está activo=1, Inactivo=2');
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
        Schema::table('responsables_activos_fijos', function (Blueprint $table) {
            //
        });
    }
}
