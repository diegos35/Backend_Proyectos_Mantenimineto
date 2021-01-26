<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class TercerosTipos extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $table = 'terceros_tipos';

    public $timestamp = true;

    public $fillable = [
        'tercero_id',
        'tipo_tercero_id'
    ];

    protected $date = [
        'deleted_at'
    ];
    
    protected $hidden = [
        'created_at', 
        'updated_at',
        'deleted_at'
    ];

    public function tercero(){
        
        return $this->belongsTo(Tercero::class, 'tercero_id', 'id');
    }

    public function tipo_tercero(){

        return $this->belongsTo(ListaElemento::class, 'tipo_tercero_id', 'id');
    }
}
