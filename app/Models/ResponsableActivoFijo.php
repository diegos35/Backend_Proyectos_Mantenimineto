<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class ResponsableActivoFijo extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $table = 'responsables_activos_fijos';
    public $timestamps = true;
    protected $fillable = ['tercero_id', 'activo_fijo_id'];
    protected $date = ['deleted_at'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

}

