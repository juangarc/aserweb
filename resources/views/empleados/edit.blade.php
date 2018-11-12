@extends('layouts.default')
@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                  @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Se han encontrado errores en la digitacion.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-info">
                      {{Session::get('success')}}
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                            <h3 class="panel-title">Editar Empleado : {{$empleado->name}}</h3>
                    </div>
                    <div class="panel-body">
            
                    
                        <div class="table-container">
                            <form method="POST" action="{{ route('empleados.update', $empleado->id) }}"  role="form">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                            <input type="number" name="id" value="{{$empleado->id}}" id="empleado_title" class="form-control input-sm" >
                                    </div>
                                    <div class="form-group">
                            <input type="text" name="name" value="{{$empleado->name}}" id="empleado_title" class="form-control input-sm" >
                                    </div>
                                    <div class="form-group">
                            <input type="text" name="apellido" value="{{$empleado->apellido}}" id="empleado_title" class="form-control input-sm" >
                                    </div>
                                    <div class="form-group">
                            <input type="number" name="telefono" value="{{$empleado->telefono}}" id="empleado_title" class="form-control input-sm" >
                                    </div>
                                    <div class="form-group">
                            <input type="email" name="correoelectronico" value="{{$empleado->correoelectronico}}" id="empleado_title" class="form-control input-sm" >
                                    </div>
                                    <div class='form-group'>
                       {{-- <input type="select" name="id_tipovinculacion"  id="empleado_title" class="form-control input-sm"> --}}  
                            <select name="id_tipovinculacion" id="id_tipovinculacion" class="form-control">
                            @foreach ($tipovinculaciones as $tipovinculacion) 
                            <option value="{{ $tipovinculacion['id'] }}">{{ $tipovinculacion['name'] }}</option>
                            @endforeach
                            </select>
                                    </div>



                         <div class="row">
                            
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <input type="submit"  value="Editar" class="btn btn-success btn-block">
                                <a href="{{ route('empleados.index') }}" class="btn btn-info btn-block" >Atras</a>
                            </div>  
                            
                         </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection