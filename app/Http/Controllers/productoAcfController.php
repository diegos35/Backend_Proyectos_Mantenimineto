<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\ActivoFijo;
use App\Models\ListaElemento;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use App\Models\categoria;

class productoAcfController extends Controller
{
    public function getData(){
        $categorias = DB::table('productos')->whereNull('productos.deleted_at')
        ->leftJoin('categorias as categoria','productos.categoria_id','=','categoria.id')
        ->leftJoin('listas_elementos as elements','productos.unidad_compra_id','=','elements.id')
        ->select(
            'productos.id as id',
            'productos.nombre as nombre',
            'productos.codigo as codigo',
            'productos.descripcion as descripcion',
            'categoria.nombre as categoria',
            'elements.nombre as unidad_compra',
            'productos.activo as activo'
        );

        return DataTables::of($categorias)->toJson(); 

    }


    public function store(Request $request , $id = null){  
        if (is_null($id)){
            $producto = new Producto();
            $mensaje = 'Registro creado exitosamente ';

        }else{
            // No se puede desactivar si la clase está asignada a un activo fijo
            $clasesAsignada = ActivoFijo::where('producto_id', $id)->get();
            if(count($clasesAsignada) > 0 && $request->activo === 2){
                $this->response->error(('No puede ser desactivado el producto, esta asignada a un activo fijo'),Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $producto = Producto::find($id);
            $mensaje = 'Registro actualizado exitosamente';
            
        }   
        $producto->forceFill($request->all())->save();

        $response= [
            'status'    => 'succes',
            'message'   => $mensaje,
        ];

        return response()->json($response);

    }

    public function create(){
        $categorias = categoria::withoutTrashed()->where('tipo_producto_id', [config('pym.tipos_producto.activo_fijo')])
        ->whereNull('deleted_at')->get();

        $unidad_compra = ListaElemento::withoutTrashed()->where('lista_tipo_id', [config('pym.tipos_listas.unidad_compra')])
        ->whereNull('deleted_at')->get();

        $response = [
                'categorias'      => $categorias,
                'unidad_compra' => $unidad_compra,
        ];
        
        return response()->json($response);
    }


    public function show($id){
        if (is_null($id) || $id == 0) {
            $response = [
                'status' => 'success',
                'code'   => 200,
                'listas' => ((object )self::create()->original),
            ];
        } else {
            $producto = Producto::withoutTrashed()->with('categoria')
            ->where('id', $id)->first();
            if (!empty($producto)) {
                $response = [
                    'status'        => 'success',
                    'data'          => $producto,
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

    public function update(Request $request, $id){
        
        return self::store($request, $id); 
    }


    public function destroy($id)
    {
        $producto = Producto::find($id);
        if (! empty($producto)) {
            $producto->delete(); 

            $response = [
                'status'     => 'success',
                'message'    => 'Registro eliminado',
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
