<?php

namespace App\Models;

use App\Http\Controllers\CategoriaController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\Models\ListaElemento;

class categoria extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $table = 'categorias';
    public $timestime = true;

    protected $dates = [
        'deleted_at'
    ];

    protected $fillable =  [    
        'nombre',
        'tipo_producto_id',
        //'categoria_id',
        'tipo_depreciacion',
        'metodo_depreciacion',
        'porcentaje_salvamento',
        'activo'
    ];   
    
    protected $hidden = [
        'created_at',
        'update_at'
    ];

    public function tipoProducto(){

        return $this->belongsTo(ListaElemento::class, 'tipo_producto_id', 'id');
    }

    // public function categoriaHijas(){

    //     return $this->belongsTo(Categoria::class, 'tipo_producto_id', 'id');
    // }

    public function metodoDepreciacion()
    {
        return $this->belongsTo(ListaElemento::class, 'metodo_depreciacion' , 'id');
    }

    public function tipoDepreciacion()
    {
        return $this->belongsTo(ListaElemento::class, 'tipo_depreciacion', 'id');
    }


}
