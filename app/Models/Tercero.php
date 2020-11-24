<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Tercero extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    /**
     * Específica a que tabla de la base de datos hace referencia el modelo
     * @var string
     */
    protected $table = 'terceros';
    
    /**
     * Específica si el modelo utiliza los campos created_at y updated_at
     * @var bool
     */
    public $timestamp = true;
  
    /**
     * Específica los campos a guardar en caso de una asignación en masa
     * @var array
     */
    protected $fillable = [
        'tipo_documento_id',
        'numero_documento',
        'nombre1',
        'nombre2',
        'apellido1',
        'apellido2',
        'genero_id',
    ];
       
    /**
     * Específica  el campo de la tabla donde se guarda el registro del borrado suave (SoftDelete)
     * @var array
     */
    protected $date = [
        'deleted_at'
    ];
    
    /**
     * Específica los campos a guardar en caso de una asignación en masa
     * @var array
     */
    protected $hidden = [
        'created_at', 
        'updated_at',
        'deleted_at'
    ];

    /*************************************************INICIO RELACIONES*************************************************/
    /**
     * Establece la relación o la llave foranea que específica el tipo de documento del tercero
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

     public function tipoDocumento()
     {
         return $this->belongsTo(ListaElemento::class , 'tipo_documento_id', 'id');
     }


    /**
     * Establece la relación o la llave foranea que específica del genero
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function genero()
    {
        return $this->belongsTo(ListaElemento::class, 'genero_id', 'id');
    }


}
