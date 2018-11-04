@extends('layouts.default')

@section('content')
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>Identificacion</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Correo Electronico</th>
                <th>Tipo de Vinculacion</th>
                <th>Fecha de nacimiento</th>
                <th>Salario</th>
                <th>Cargo</th>
                <th>Sede</th>
                <th>Fecha de Ingreso</th>
                <th>Genero</th>
                <th>Estado</th>
                <th colspan="2" style="text-align: center;">Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $key => $empleado)
            <tr>
                <td>{{$empleado->id}}  </td>
                <td>{{$empleado->name}}</td>
                <td>{{$empleado->apellido}}</td>
                <td>{{$empleado->telefono}}</td>
                <td>{{$empleado->correoelectronico}}</td>
                <td>{{$empleado->id_tipovinculacion}}  </td>
                <td>{{$empleado->fechadenacimiento}}</td>
                <td>{{$empleado->salario}}</td>
                <td>{{$empleado->id_cargo}}</td>
                <td>{{$empleado->id_sede}}</td>
                <td>{{$empleado->fechadeingreso}}</td>
                <td>{{$empleado->id_genero}}</td>
                <td>{{$empleado->estado}}</td>
                <td style="text-align: center;">
                    <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-info" >Editar<a></td/>
                        <td style="text-align: center;"> <form action="{{route('empleados.destroy', $empleado->id)}}" method="post">
                           {{csrf_field()}}
                           <input name="_method" type="hidden" value="DELETE">
                           <button class="btn btn-danger" type="submit">Eliminar</button>
                       </form>
                       </td>

                   </tr>
                   @endforeach
               </tbody>
           </table>
           {!!$empleados->render()!!}
           <a href="{{ route('empleados.create') }}" class="btn btn-success"  >Crear nuevo Empleado<a>
           </div>
           @stop