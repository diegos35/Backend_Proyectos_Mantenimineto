<?php

namespace App\Http\Controllers;

use App\Models\ListaElemento;
use App\Models\ListaTipo;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;

use PDOException; 


class ListaElementoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }



    /**
     * Mostrar la lista de todos los datos activos de Tipos de Lista en un Datatable.
     * @param int $elemento
     * @return Response
     * 
     */
    public function getData($elemento)
    {
        $id = config('pym.tipos_listas.' . $elemento);
        $elements = ListaElemento::withTrashed()->where('lista_tipo_id', $id)->whereNull('deleted_at')->get();
        
        return DataTables::of($elements)
        ->with('tipo_lista_id',$id)->toJson(); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposListas = ListaTipo::withoutTrashed()->orderBy('nombre', 'ASC')->get();
        $response = [
            'tipos_listas'          => $tiposListas,
        ];

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $listaElemento = new ListaElemento(); //nuevo registro
        $listaElemento->nombre = $request->input('nombre');
        $listaElemento->descripcion = $request->input('descripcion');
        $listaElemento->lista_tipo_id = $request->lista_tipo_id;
        $listaElemento->activo = $request->activo;
        if (! empty($request->input('lista_elemento_id'))) {
            $listaElemento->lista_elemento_id = $request->input('lista_elemento_id');
        }
        try {
            $listaElemento->save();

            
            return response()->json([
                'message' => 'creado',
                'id'      => $listaElemento->id,
            ])->setStatusCode(Response::HTTP_CREATED);

        } catch (QueryException $e){
			//ERROR EN UNA CONSULTA SQL
            response()->json(['status' => 'error', 'message' => 'messages.bd.error_bd' . $e]);
		} catch (PDOException $e){
			//ERROR AL BUSCAR EL DRIVER DE LA CONEXIÓN
			response()->json(['status' => 'error', 'message' => ('messages.register_not_found')]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ListaElemento  $listaElemento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (is_null($id) || $id == 0) {
            $response = [
                'status' => 'success',
                'code'   => 200,
                'listas' => self::create(),
            ];
        } else {
            $listaElemento = DB::table('listas_elementos')->find($id);
            if (!empty($listaElemento)) {
                $response = [
                    'status'         => 'success',
                    'lista_elemento' => $listaElemento,
                    'listas'         => self::create(),
                ];
            } else {
                $response = [
                    'status'     => 'error',
                    'message'    => ('register_not_found'),
                ];
            }
        }

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ListaElemento  $listaElemento
     * @return \Illuminate\Http\Response
     */
    public function edit(ListaElemento $listaElemento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ListaElemento  $listaElemento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
    
        $listaElemento = ListaElemento::find($id); //editar registro
        
        $listaElemento->descripcion = $request->descripcion;
        $listaElemento->nombre = $request->nombre;
        $listaElemento->lista_tipo_id = $request->lista_tipo_id;
        $listaElemento->activo = $request->activo;
        
        try {
            $listaElemento->save();

            return response()->json([
                'message' => 'register_update'
            ])->setStatusCode(Response::HTTP_OK);

        } catch (QueryException $e){
			//ERROR EN UNA CONSULTA SQL
			response()->json(('messages.bd.error_bd').$e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
		} catch (PDOException $e){
			//ERROR AL BUSCAR EL DRIVER DE LA CONEXIÓN
			response()->json(('messages.bd.driver_not_found').$e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListaElemento  $listaElemento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listaElemento = ListaElemento::find($id);
        if (! empty($listaElemento)) {
            $listaElemento->delete(); //ELIMINAR, DELETE
            //arreglo con datos o mensajes de respueta, array with datas o messages to return
            $response = [
                'status'     => 'success',
                'message'    => 'register_deleted',
            ];
        } else {
            $response = [
                'status'     => 'error',
                'message'    => 'register_not_found',
            ];
        }

        return response()->json($response);
    }
}
