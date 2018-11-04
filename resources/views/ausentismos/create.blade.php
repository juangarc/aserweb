@extends('layouts.default')

@section('content')
  <div class="container">
            <h2>Crear un nuevo Ausentismo </h2>
            <hr>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('ausentismos.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Codigo* </label>
                    <input type="number" name="id" class="form-control">
                    <label>Fecha de Registro* </label>
                    <input type="date" name="fecha_registro" class="form-control">
                    <label>Nombre de Empleado* </label>
                    {{-- <input type="select" name="id_empleado" class="form-control"> --}}
                    <select name="id_empleado" id="id_empleado" class="form-control">
                        @foreach ($empleados as $empleado) 
                        <option value="{{ $empleado['id'] }}">{{ $empleado['name'] }}</option>
                        @endforeach
                        </select>
                    <label>Tipo de Ausentismo* </label>
                    {{-- <input type="select" name="id_tipoausentismo" class="form-control"> --}}
                    <select name="id_tipoausentismo" id="id_tipoausentismo" class="form-control">
                        @foreach ($tipoausentismos as $tipoausentismos) 
                        <option value="{{ $tipoausentismo['id'] }}">{{ $tipoausentismo['name'] }}</option>
                        @endforeach
                        </select>
                    <label>Area* </label>
                    <input type="text" name="area" class="form-control">
                    <label>Fecha de Inicio* </label>
                    <input type="date" name="fecha_inicio" class="form-control">
                    <label>Tiempo de Ausencia* </label>
                    <input type="datetime" name="tiempo_ausencia" class="form-control">
                    <label>Grado* </label>
                    <input type="date" name="grado" class="form-control">                   
                    <label>Observacion* </label>
                    <input type="text" name="observacion" class="form-control">    
                    </div>      
            </form>          
        </div>
@endsection