@extends('layouts.default')

@section('content')
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>codigo</th>
                <th>Fecha de Registro</th>
                <th>Nombre de Empleado</th>
                <th>Tipo de Ausentismo</th>
                <th>Area</th>
                <th>Fecha de inicio</th>
                <th>Tiempo de Ausencia</th>
                <th>Grado</th>
                <th>Observacion</th>
                <th colspan="2" style="text-align: center;">Accion</th>
            </tr>
        </thead> 
        <tbody>
            @foreach($ausentismos as $key => $ausentismo)
            <tr>
                <td>{{$ausentismo->id}}  </td>
                <td>{{$ausentismo->fecha_registro}}</td>
                <td>{{$ausentismo->id_empleado}}</td>
                <td>{{$ausentismo->id_tipoausentismo}}</td>
                <td>{{$ausentismo->area}}</td>
                <td>{{$ausentismo->fecha_inicio}}  </td>
                <td>{{$ausentismo->tiempo_ausencia}}</td>
                <td>{{$ausentismo->Grado}}</td>
                <td>{{$ausentismo->observacion}}</td>
                <td style="text-align: center;">
                    <a href="{{ route('ausentismos.edit', $ausentismo->id) }}" class="btn btn-info" >Editar<a></td/>
                        <td style="text-align: center;"> <form action="{{route('ausentismos.destroy', $ausentismo->id)}}" method="post">
                           {{csrf_field()}}
                           <input name="_method" type="hidden" value="DELETE">
                           <button class="btn btn-danger" type="submit">Eliminar</button>
                       </form>
                       </td>

                   </tr>
                   @endforeach
               </tbody>
           </table>
           {!!$ausentismos->render()!!}
           <a href="{{ route('ausentismos.create') }}" class="btn btn-success"  >Crear nuevo Ausentismo<a>
           </div>
           @stop