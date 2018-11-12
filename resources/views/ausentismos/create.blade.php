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
                        @foreach ($tipoausentismos as $tipoausentismo) 
                        <option value="{{ $tipoausentismo['id'] }}">{{ $tipoausentismo['name'] }}</option>
                        @endforeach
                        </select>
                    <label>Area* </label>
                    <input type="text" name="area" class="form-control">
                    <label>Fecha de Inicio* </label>
                    <input type="date" name="fecha_inicio" class="form-control">
                    <label>Tiempo de Ausencia* </label>
                    <input type="datetime-local" name="tiempo_ausencia" class="form-control">
                    <label>Grado* </label>
                    <select name="grado" id="grado" class="form-control">
                    <option value="Leve">Leve</option>
                    <option value="Severo">Severo</option>
                    </select>                
                    <label>Observacion* </label>
                    <input type="text" name="observacion" class="form-control">    
                    </div>
                    <a href="{{ route('ausentismos.index') }}" class="btn btn-default">Cancelar</a>
                   <button type="submit" class="btn btn-primary">Crear</button>       
            </form>          
        </div>
@endsection