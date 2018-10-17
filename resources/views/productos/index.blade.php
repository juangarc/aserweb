@extends('layouts.default')

@section('content')
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Vencimiento</th>
                <th>Valor</th>
                <th colspan="2" style="text-align: center;">Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $key => $producto)
            <tr>
                <td>{{$producto->id}}  </td>
                <td>{{$producto->name}}</td>
                <td>{{$producto->fechainicio}}</td>
                <td>{{$producto->fechafinal}}</td>
                <td>{{$producto->valor}}  </td>
                <td style="text-align: center;">
                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-info" >Editar<a></td/>
                        <td style="text-align: center;"> <form action="{{route('productos.destroy', $producto->id)}}" method="post">
                           {{csrf_field()}}
                           <input name="_method" type="hidden" value="DELETE">
                           <button class="btn btn-danger" type="submit">Eliminar</button>
                       </form>
                       </td>         

                   </tr>
                   @endforeach
               </tbody>
           </table>
           {!!$productos->render()!!}
           <a href="{{ route('productos.create') }}" class="btn btn-success"  >Crear nuevo Producto<a>
           </div>
           @stop