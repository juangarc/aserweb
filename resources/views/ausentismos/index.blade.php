@extends('layouts.default')

@section('content')
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>codigo</th>
                <th>Fecha de Registro</th>
                <th>Identificacion</th>
                <th>Nombre de Empleado</th>
                <th>Tipo de Ausentismo</th>
                <th>Cargo</th>
                <th>Fecha de inicio</th>
                <th>Tiempo de Ausencia</th>
                <th>Costo de Ausencia</th>
                <th>Grado</th>
                <th>Observacion</th>
                <th colspan="3" style="text-align: center;">Accion</th>
            </tr>
        </thead> 
        <tbody>
            @foreach($ausentismos as $key => $ausentismo)
            <tr>
                <td>{{$ausentismo->id}}</td>
                <td>{{$ausentismo->fecha_registro}}</td>
                <td>{{$ausentismo->id_empleado}}</td>
                <td>{{$ausentismo->nameEmpleado . " " . $ausentismo->apellidoEmpleado}}</td>
                <td>{{$ausentismo->nameTipoausentismo}}</td>
                <td>{{$ausentismo->nameCargo}}</td>
                <td>{{$ausentismo->fecha_inicio}}  </td>
                <td>{{$ausentismo->tiempo_ausencia}}</td>
                <td>{{$ausentismo->costo_ausencia}}</td>
                <td>{{$ausentismo->Grado}}</td>
                <td>{{$ausentismo->observacion}}</td>
                <td style="text-align: center;">
                    <a href="{{ route('ausentismos.edit', $ausentismo->id) }}" class="btn btn-info" id = "btn-edi" >Editar<a></td/>
                        <td style="text-align: center;"> <form action="{{route('ausentismos.destroy', $ausentismo->id)}}" method="post">
                           {{csrf_field()}}
                           <input name="_method" type="hidden" value="DELETE">
                           <button class="btn btn-danger" type="submit">Eliminar</button>
                           <td>
                           <a href="{{ route('ausentismos.show', $ausentismo->id) }}" class="btn btn-success">Ver<a>
                           <!-- <a href="ausentismos.show" class="btn btn-success">Ver<a> -->
                           </td>
                       </form>
                       </td>                  
                   </tr>
                   @endforeach          
               </tbody>
           </table>
           {!!$ausentismos->render()!!}
           <a href="{{ route('ausentismos.create') }}" class="btn btn-success">Crear Ausentismo<a>
           
           </div>
           @stop
    @section('scripts')
    <script>
    // $(document).ready(function() {
    // $('#btn-edi').click(function() {
    //     alert("documento listo");
    // });  
//})
    </script>
    @endsection