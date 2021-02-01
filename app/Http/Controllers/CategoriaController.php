<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\ListaElemento;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{

    /**
     * Retorna las categoria para el Datatable.
     * @return Datatable
     */
    public function getData(){  
        $categorias = DB::table('categorias')->whereNull('categorias.deleted_at')
        ->leftJoin('listas_elementos as elementos','categorias.metodo_depreciacion','=','elementos.id')
        ->leftJoin('listas_elementos as elements','categorias.tipo_producto_id','=','elements.id')
        ->leftJoin('listas_elementos as element','categorias.tipo_depreciacion','=','element.id')
        ->select('categorias.id as id',
                 'categorias.nombre as nombre',
                 'elementos.nombre as metodo_depreciacion',
                 'element.nombre as tipo_depreciacion',
                 'elements.nombre as tipo_producto',
        );

        return DataTables::of($categorias)->toJson(); 
    }

    /**
     * Retorna las listas para el formulario de categorías
     * @return $response: array con las listas
     */
    public function create(){
        $tipo_producto = ListaElemento::withoutTrashed()->where('lista_tipo_id', [config('pym.tipos_listas.tipo_producto')])
        ->whereNull('deleted_at')->get();

        $metodo_depreciacion = ListaElemento::withoutTrashed()->where('lista_tipo_id', [config('pym.tipos_listas.metodo_depreciacion')])
        ->whereNull('deleted_at')->get();

        $tipo_depreciacion = ListaElemento::withoutTrashed()->where('lista_tipo_id', [config('pym.tipos_listas.tipo_depreciacion')])
        ->whereNull('deleted_at')->get();

        $response = [
                'tipo_producto'      => $tipo_producto,
                'metodo_depreciacion' => $metodo_depreciacion,
                'tipo_depreciacion'  => $tipo_depreciacion
        ];
        
        return response()->json($response);
    }

    /**
     * Método que guarda en base de datos la categoria
     * 
     * @param Request $request 
     * @param int $id: 
     */
    public function store(Request $request , $id = null){  
        if (is_null($id)){
            $categoria = new categoria();
            $mensaje = 'Registro creado exitosamente ';

        }else{
            
            $categoria = categoria::find($id);
            $mensaje = 'Registro actualizado exitosamente';
            
        }   
        $categoria->categoria_id = $request->categoria_id;
        $categoria->nombre = $request->nombre;
        $categoria->tipo_producto_id = $request->tipo_producto_id;  
        $categoria->metodo_depreciacion = $request->metodo_depreciacion;
        $categoria->tipo_depreciacion = $request->tipo_depreciacion;

        $categoria->save();
        $response= [
            'status'    => 'succes',
            'message'   => $mensaje,
        ];

        return response()->json($response);

    }


    /**
     *Método encargado de retornar las listas ó la categoría con las listas
     *dependiendo de del paramentro
     *
     * @param  int $id
     * @return Response $response
     */
    public function show($id){
        if (is_null($id) || $id == 0) {
            $response = [
                'status' => 'success',
                'code'   => 200,
                'listas' => ((object )self::create()->original),
            ];
        } else {
            $categoria = categoria::withoutTrashed()->with('tipoProducto', 'metodoDepreciacion', 'tipoDepreciacion')
            ->where('id', $id)->first();
            if (!empty($categoria)) {
                $response = [
                    'status'        => 'success',
                    'data'          => $categoria,
                    'listas'        => ((object )self::create()->original),
                ];
            } else {
                $response = [
                    'status'     => 'error',
                    'message'    => 'Registro no encontrado',
                ];
            }
        }

        return response()->json($response);
    }


    /**
     * Método que actuzaliza la categoria 
     * @param Request $request
     * @param int $id
     * @return $response
     */
    public function update(Request $request, $id){
        
        return self::store($request, $id); 
    }
    

    /**
     * Elimina una categoria especifica.
     *
     * @param  int $id
     * @return  Response $response
     */
    public function destroy($id)
    {
        $categoria = categoria::find($id);
        if (! empty($categoria)) {
            $categoria->delete(); 

            $response = [
                'status'     => 'success',
                'message'    => 'register_deleted',
            ];
        } else {
            $response = [
                'status'     => 'error',
                'message'    => 'Registro no encontrado',
            ];
        }

        return response()->json($response);
    }
}
