@extends('layouts.default')

@section('content')
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Name</th>
                <th colspan="2" style="text-align: center;">Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tipoExamenes as $key => $tipoExamen)
            <tr>
                <td>{{$tipoExamen->id}}  </td>
                <td>{{$tipoExamen->name}}</td>
                <td style="text-align: center;">
                    <a href="{{ route('tipoexamen.edit', $tipoExamen->id) }}" class="btn btn-info" >Editar<a></td/>
                        <td style="text-align: center;"> <form action="{{route('tipoexamen.destroy', $tipoExamen->id)}}" method="post">
                           {{csrf_field()}}
                           <input name="_method" type="hidden" value="DELETE">
                           <button class="btn btn-danger" type="submit">Eliminar</button>
                       </form>
                       </td>         

                   </tr>
                   @endforeach
               </tbody>
           </table>
           {!!$tipoExamenes->render()!!}
           <a href="{{ route('tipoexamen.create') }}" class="btn btn-success"  >Crear nuevo tipo<a>
           </div>
           @stop