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
            @foreach($tipoVinculaciones as $key => $tipoVinculacion)
            <tr>
                <td>{{$tipoVinculacion->id}}  </td>
                <td>{{$tipoVinculacion->name}}</td>
                <td style="text-align: center;">
                    <a href="{{ route('tipovinculacion.edit', $tipoVinculacion->id) }}" class="btn btn-info" >Editar<a></td/>
                        <td style="text-align: center;"> <form action="{{route('tipovinculacion.destroy', $tipoVinculacion->id)}}" method="post">
                           {{csrf_field()}}
                           <input name="_method" type="hidden" value="DELETE">
                           <button class="btn btn-danger" type="submit">Eliminar</button>
                       </form>
                       </td>         

                   </tr>
                   @endforeach
               </tbody>
           </table>
           {!!$tipoVinculaciones->render()!!}
           <a href="{{ route('tipovinculacion.create') }}" class="btn btn-success"  >Crear nuevo tipo de vinculacion<a>
           </div>
           @stop