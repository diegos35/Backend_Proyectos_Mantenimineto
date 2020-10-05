<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaTipo extends Model
{
    protected $table = 'listas_tipos';
    public $timestamps = true;


    protected $dates = ['deleted_at'];
    protected $fillable = ['prv_lista_tipo_id', 'nombre'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];



    public function lista_elementos_id()
    {

        return $this->hasMany('ListaElemento');
    }
}
