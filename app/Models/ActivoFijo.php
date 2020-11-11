<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

use App\Models\Producto;
use App\Models\ListaElemento;


class ActivoFijo extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $table = 'activos_fijos';
    public $timestamps = true;

    protected $date = ['deleted_at'];
    protected $fillable =[
        'producto_id',
    	'codigo_unspsc',
        'codigo_barra',
        'imagen',
        'nombre',
        'tipo_activo',
        'compuesto',
        'compuesto_de',
        'descripcion',
        'marca_id',
        'unidad_mayor_id',
    	'numero_serie',
        'modelo',
        'valor_salvamento',
        'porcentaje_salvamento',
        'estado_activo_fijo',
        'bodega_id',
        'tercero_id',
        'numero_factura',
        'fecha_factura',
        'valor_compra',
        'garantia',
        'metodo_depreciacion',
        'tipo_depreciacion',
        'valor_depreciacion',
        'deterioro',
        'valor_actual',
        'avaluo',
        'fecha_salida_servicio',
        'vida_util',
        'meses_depreciados',
        'dias_depreciados',
        'meses_pendientes_depreciacion',
        'dias_pendientes_depreciacion',
        'activo'
    ];
    protected $hidden = ['created_at','updated_at', 'deleted_at'];
    
    public function producto(){
        return $this->belongsTo(Producto::class, 'producto_id', 'id');
    }
    //Relacion con las marcas 
    public function marca()
    {
        return $this->belongsTo('App\Models\ListaElemento', 'marca_id', 'id');
    }
    
    public function unidadCompra()
    {
        return $this->belongsTo(ListaElemento::class, 'unidad_mayor_id', 'id');

    }

    public function estadoActivoFijo()
    {
        return $this->belongsTo(ListaElemento::class, 'estado_activo_fijo');
    } 

    public function metodoDepreciacion()
    {
        return $this->belongsTo(ListaElemento::class, 'metodo_depreciacion' , 'id');
    }

    public function tipoDepreciacion()
    {
        return $this->belongsTo(ListaElemento::class, 'tipo_depreciacion', 'id');
    }

    //relacion del activo fijo si tien un componente Hijo
    public function compuestoDe()
    {
        return  $this->belongsTo(ActivoFijo::class, 'compuesto_de', 'id');

    }

}
