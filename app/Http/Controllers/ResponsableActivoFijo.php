<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ResponsableActivoFijo extends Controller
{
    public function getData(){
        $responablesActivoFijo = DB::table('responsables_activos_fijos')->whereNull('responsables_activos_fijos.deleted_at')
        ->leftJoin('terceros as tercero', 'responsables_activos_fijos.tercero_id', '=', 'tercero.id')
        ->leftJoin('listas_elementos as elementos','tercero.tipo_documento_id','=','elementos.id')
        ->select(
            'tercero.activo As activo',
            DB::raw("CONCAT(elementos.nombre,' ',tercero.numero_documento,'-',tercero.nombre1, ' ', tercero.nombre2, ' ', tercero.apellido1, ' ', tercero.apellido2)AS empleado"),
        );
        return DataTables::of($responablesActivoFijo)->toJson(); 
    }
}
