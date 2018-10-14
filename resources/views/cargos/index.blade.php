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
            @foreach($cargos as $key => $cargo)
            <tr>
                <td>{{$cargo->id}}  </td>
                <td>{{$cargo->name}}</td>
                <td style="text-align: center;">
                    <a href="{{ route('cargos.edit', $cargo->id) }}" class="btn btn-info" >Editar<a></td/>
                        <td style="text-align: center;"> <form action="{{route('cargos.destroy', $cargo->id)}}" method="post">
                           {{csrf_field()}}
                           <input name="_method" type="hidden" value="DELETE">
                           <button class="btn btn-danger" type="submit">Eliminar</button>
                       </form>
                       </td>         

                   </tr>
                   @endforeach
               </tbody>
           </table>
           {!!$cargos->render()!!}
           <a href="{{ route('cargos.create') }}" class="btn btn-success"  >Crear nuevo cargo<a>
           </div>
           @stop