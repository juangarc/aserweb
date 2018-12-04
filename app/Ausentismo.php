<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ausentismo extends Model
{
    protected $fillable = ['id','fecha_registro','id_empleado','id_tipoausentismo','id_cargo','fecha_inicio','tiempo_ausencia',
    'costo_ausencia', 'grado','observacion'];
}
