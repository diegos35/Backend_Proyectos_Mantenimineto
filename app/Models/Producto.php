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
    
    protected $fillable = ['categoria_id','nombre', 'descripcion','unida_mayor_id' ,'activo'];
    protected $date = ['deleted_at'];
    protected $hidden = ['created_at','updated_at','deleted_at'];

}
