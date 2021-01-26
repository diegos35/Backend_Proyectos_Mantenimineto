<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Tercero;
use App\Models\ListaElemento;
use App\Models\ResponsableAcf;
use App\Models\TercerosTipos;

class ResponsableActivoFijo extends Controller
{
    public function getData(){
        $responablesActivoFijo  = DB::table('terceros_tipos')->whereNull('terceros_tipos.deleted_at')
        ->leftJoin('terceros as tercero', 'terceros_tipos.tercero_id', '=', 'tercero.id')
        ->leftJoin('listas_elementos as elementos','tercero.tipo_documento_id','=','elementos.id')
        ->select(
            'terceros_tipos.tercero_id AS id',
            'tercero.activo As activo',
            DB::raw("CONCAT(elementos.nombre,' - ',tercero.numero_documento,' - ',tercero.nombre1, ' ', tercero.nombre2, ' ', tercero.apellido1, ' ', tercero.apellido2)AS empleado"),
        )
        ->where('tipo_tercero_id', config('pym.tipos_tercero.responsable_activo_fijo'));
        return DataTables::of($responablesActivoFijo)->toJson(); 
    }


    public function buscarTercero(Request $request){
         $terceros = Tercero::withoutTrashed()
            ->leftjoin('listas_elementos as elementos', 'terceros.tipo_documento_id', '=', 'elementos.id')
                ->select(
                    'terceros.id',
                    'elementos.nombre as tipo_identificacion',   
                    DB::raw("CONCAT(elementos.nombre,' - ',numero_documento) AS numero_documento"),
                    'nombre1',
                    'nombre2',
                    'apellido1',
                    'apellido2',
                )->whereNotIn('terceros.id', $request->ignorarTerceros);  
        //Filtros
        if ($request->tipo_documento_id) {
            $terceros->where('tipo_documento_id', 'like', '%'. $request->tipo_documento_id . '%');
        }
        if ($request->numero_documento) {
            $terceros->where('numero_documento', 'like', '%'. $request->numero_documento. '%');
        }
        if ($request->nombre1) {
            $terceros->where('nombre1', 'like', '%'. $request->nombre1 . '%');
        }    
        if ($request->nombre1) {
            $terceros->where('nombre1', 'like', '%'. $request->nombre1 . '%');
        }
        if ($request->nombre2) {
            $terceros->where('nombre2', 'like', '%' .$request->nombre2 . '%');
        }
        if ($request->apellido1) {
            $terceros->where('apellido1', 'like', '%'. $request->apellido1 . '%');
        }
        if ($request->apellido2) {
            $terceros->where('apellido2', 'like', '%' . $request->apellido2 . '%');
        }

        return datatables()->eloquent($terceros)->toJson();
    }

    public function tiposDocumentos(){
        
        $id = config('pym.tipos_listas.tipo_documento');
        $tiposDocumentos =  ListaElemento::withTrashed()->where('lista_tipo_id', $id)->whereNull('deleted_at')->get();
        $response = array(
            'status'=> 'success',
            'code'  =>  200,
            'listas'=>[
                'tipos_documentos'=> $tiposDocumentos,
            ]
        );

        return response()->json($response);
    
    }


    public function guardarResponsableActivoFijo(Request $request){
        
        $terceros = $request->com_tercero_id;
        foreach($terceros as $responsables){
            $responsable = new TercerosTipos();
            $responsable->tercero_id = $responsables;
            $responsable->tipo_tercero_id = config('pym.tipos_tercero.responsable_activo_fijo');
            $responsable->save();
        }
        $response = [
            'status' => 'success',
            'code' => 200,
            'message'  => 'Registro creado exitosamente',
        ];

     return response()->json($response);
    }

    public function destroy($id){
        $validaractivofijo = ResponsableAcf::withoutTrashed()->where('tercero_id', $id)->count();
        if ($validaractivofijo <=0){
            $responsable = TercerosTipos::withoutTrashed()
            ->where(['tercero_id' => $id, 'tipo_tercero_id' => config('pym.tipos_tercero.responsable_activo_fijo')])->get()->each->delete();
            dd($responsable);
            $responsable->delete(); 
                $response = [
                    'status' => 'success',
                    'code'   => 200,
                    'message'    => 'Registro eliminado exitosamente'
                ];
            }else{
                $response = array(
                    'message' => 'El responsable tiene a cargo activos fijos',
                    'status' =>
                    'error'
                );
                return response()->json($response, 400);
            }
            return response()->json($response);
    }


}
