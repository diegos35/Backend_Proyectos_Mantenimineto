<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class ResponsableAcf extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    /**
     * Específica a que tabla de la base de datos hace referencia el modelo
     * @var string
     */
    protected $table = 'responsables_activos_fijos';
    
    /**
     * Específica si el modelo utiliza los campos created_at y updated_at
     * @var bool
     */
    public $timestamps = true;

    /**
     * Específica los campos a guardar en caso de una asignación en masa
     * @var array
     */
    protected $fillable = [
        'tercero_id',
        'activo_fijo_id'
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

    /**
     *Relación con la llave foranea que específica el tipo de tercero
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tercero(){
        
        return $this->belongsTo(Tercero::class, 'tecero_id', 'id');
    }

    /**
     * Relación con la lleve foranea que específica el activo fijo
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

     public function activoFijo(){

        return $this->belongsTo(ActivoFijo::class, 'activo_fijo_id', 'id');
     }


}

