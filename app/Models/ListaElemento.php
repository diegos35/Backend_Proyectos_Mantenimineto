<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\SoftDeletes; 
use Illuminate\Notifications\Notifiable;

class ListaElemento extends Model 
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $table = 'listas_elementos';
    public $timestime = true;

    protected $dates = ['deleted_at'];
    protected $fillable =  ['lista_tipo_id', 'descripcion'];   
    protected $hidden = ['created_at', 'update_at'];

    public function tipo_lista(){

        return $this->belongsTo('lista_tipo_id', 'id');
    }
}
