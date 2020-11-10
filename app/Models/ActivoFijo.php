<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

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
    protected $hiden = ['created_at','update_at', 'deleted_at'];

}
