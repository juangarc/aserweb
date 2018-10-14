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
            @foreach($sedes as $key => $sede)
            <tr>
                <td>{{$sede->id}}  </td>
                <td>{{$sede->name}}</td>
                <td style="text-align: center;">
                    <a href="{{ route('sedes.edit', $sede->id) }}" class="btn btn-info" >Editar<a></td/>
                        <td style="text-align: center;"> <form action="{{route('sedes.destroy', $sede->id)}}" method="post">
                           {{csrf_field()}}
                           <input name="_method" type="hidden" value="DELETE">
                           <button class="btn btn-danger" type="submit">Eliminar</button>
                       </form>
                       </td>         

                   </tr>
                   @endforeach
               </tbody>
           </table>
           {!!$sedes->render()!!}
           <a href="{{ route('sedes.create') }}" class="btn btn-success"  >Crear nueva sede<a>
           </div>
           @stop