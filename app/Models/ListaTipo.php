<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes; 
use Illuminate\Notifications\Notifiable;

class ListaTipo extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $table = 'listas_tipos';
    public $timestamps = true;


    protected $dates = ['deleted_at'];
    protected $fillable = ['lista_tipo_id', 'nombre'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];



    public function lista_elementos_id()
    {

        return $this->hasMany('ListaElemento');
    }
}
