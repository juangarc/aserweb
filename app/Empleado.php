<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = ['id','name','apellido','telefono','correoelectronico','id_tipovinculacion','fechadenacimiento','salario','id_cargo'];
}
