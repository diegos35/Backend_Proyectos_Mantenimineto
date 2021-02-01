<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;



class FichaActivoFijo extends Controller
{   

    public function getData(){
        $activosFijos = DB::table('activos_fijos')->whereNull('activos_fijos.deleted_at')
        ->leftJoin('productos', 'productos.id', '=', 'activos_fijos.producto_id')
        ->leftJoin('categorias', 'categorias.id', '=', 'productos.categoria_id')
        ->leftJoin('listas_elementos AS uc', 'uc.id', '=', 'activos_fijos.unidad_compra_id')
        ->leftJoin('listas_elementos AS estadoAcf', 'estadoAcf.id', '=', 'activos_fijos.estado_activo_fijo')
        ->select(
            'activos_fijos.id',
            'activos_fijos.codigo_unspsc',
            'activos_fijos.nombre',
            'uc.nombre AS unidad_compra',
            DB::raw("CONCAT(categorias.codigo,' - ',categorias.nombre) AS categoria"),
            'activos_fijos.numero_serie AS serie',
            'activos_fijos.modelo',
            'activos_fijos.codigo_barra',
            'activos_fijos.valor_actual AS valor',
            'estadoAcf.nombre AS estado'
        );

    return DataTables::of($activosFijos)->toJson(); 
    }
}
