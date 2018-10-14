@extends('layouts.default')

@section('content')
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th colspan="2" style="text-align: center;">Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tipoEspecialidades as $key => $tipoEspecialidad)
            <tr>
                <td>{{$tipoEspecialidad->id}}  </td>
                <td>{{$tipoEspecialidad->name}}</td>
                <td style="text-align: center;">
                    <a href="{{ route('tipoespecialidad.edit', $tipoEspecialidad->id) }}" class="btn btn-info" >Editar<a></td/>
                        <td style="text-align: center;"> <form action="{{route('tipoespecialidad.destroy', $tipoEspecialidad->id)}}" method="post">
                           {{csrf_field()}}
                           <input name="_method" type="hidden" value="DELETE">
                           <button class="btn btn-danger" type="submit">Eliminar</button>
                       </form>
                       </td>         

                   </tr>
                   @endforeach
               </tbody>
           </table>
           {!!$tipoEspecialidades->render()!!}
           <a href="{{ route('tipoespecialidad.create') }}" class="btn btn-success"  >Crear nuevo tipo<a>
           </div>
           @stop