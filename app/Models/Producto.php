<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Producto extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $table = 'productos';

    public $timestamps = true;
    
    protected $fillable = [
        'categoria_id',
        'nombre',
        'codigo',   
        'descripcion',
        'unidad_compra_id',
        'activo'
    ];
    
    protected $date = [
        'deleted_at'
    ];
    
    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    /**Relaciones productos */

    public function categoria(){

        return $this->belongsTo(categoria::class, 'categoria_id', 'id');
    }

    public function unidad_compra(){

        return $this->belongsTo(ListaElemento::class, 'unidad_compra_id', 'id');
    }



}
