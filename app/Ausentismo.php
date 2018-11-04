<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ausentismo extends Model
{
    protected $fillable = ['id','fecha_registro','id_empleado','id_tipoausentismo','area','fecha_inicio','tiempo_ausencia','grado','observacion'];
}
