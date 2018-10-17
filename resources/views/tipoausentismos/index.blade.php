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
            @foreach($tipoausentismos as $key => $tipoausentismo)
            <tr>
                <td>{{$tipoausentismo->id}}  </td>
                <td>{{$tipoausentismo->name}}</td>
                <td style="text-align: center;">
                    <a href="{{ route('tipoausentismos.edit', $tipoausentismo->id) }}" class="btn btn-info" >Editar<a></td/>
                        <td style="text-align: center;"> <form action="{{route('tipoausentismos.destroy', $tipoausentismo->id)}}" method="post">
                           {{csrf_field()}}
                           <input name="_method" type="hidden" value="DELETE">
                           <button class="btn btn-danger" type="submit">Eliminar</button>
                       </form>
                       </td>         

                   </tr>
                   @endforeach
               </tbody>
           </table>
           {!!$tipoausentismos->render()!!}
           <a href="{{ route('tipoausentismos.create') }}" class="btn btn-success"  >Crear nuevo Tipo de Ausentismo<a>
           </div>
           @stop