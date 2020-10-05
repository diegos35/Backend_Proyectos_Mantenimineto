<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaElemento extends Model
{
    protected $table = ['listas_elemtos'];
    public $timestime = true;

    protected $dates = ['deleted_at'];
    protected $fillable =  ['lista_tipo_id', 'descripcion'];   
    protected $hidden = ['created_at', 'update_at'];

    public function tipo_lista(){

        return $this->belongsTo('lista_tipo_id', 'id');
    }
}
