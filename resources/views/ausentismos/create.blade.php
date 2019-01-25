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
                    <label>Identificacion del empleado* </label>
                    <input type="number" name="id_iden" class="form-control" id="codigo">
                    <input type="button" class="btn btn-primary" value="Buscar" onclick="getMessage();">
                    <br>
                    <label>Nombre de Empleado* </label>
                    <input type="text" name="id_empleado" class="form-control" id="id_emple">
                    <label>Tipo de Ausentismo* </label>
                    {{-- <input type="select" name="id_tipoausentismo" class="form-control"> --}}
                    <select name="id_tipoausentismo" id="id_tipoausentismo" class="form-control">
                        @foreach ($tipoausentismos as $tipoausentismo) 
                        <option value="{{ $tipoausentismo['id'] }}">{{ $tipoausentismo['name'] }}</option>
                        @endforeach
                        </select>
                    <label>Cargo* </label>
                    {{-- <input type="select" name="id_cargo" class="form-control"> --}}
                    <select name="id_cargo" id="id_cargo" class="form-control">
                        @foreach ($cargos as $cargo) 
                        <option value="{{ $cargo['id'] }}">{{ $cargo['name'] }}</option>
                        @endforeach
                        </select>
                    <label>Fecha de Inicio* </label>
                    <input type="date" name="fecha_inicio" class="form-control">
                    <label>Tiempo de Ausencia / Dias* </label>
                    <input type="text" name="tiempo_ausencia" id="tiempo_ausencia" class="form-control">
                    <input type="button" class="btn btn-primary" value="Calcular" onclick="sumar();">
                    <br>
                    <label>Costo de Ausencia / $ </label>
                    <input  type="text" name="costo" id="costo_ausencia" class="form-control">
                    <label>Grado* </label>
                    <select name="grado" id="grado" class="form-control">
                    <option value="LEVE">LEVE</option>
                    <option value="SEVERO">SEVERO</option>
                    </select>                
                    <label>Observacion* </label>
                    <input type="text" name="observacion" class="form-control">
                    </div>
                    <a href="{{ route('ausentismos.index') }}" class="btn btn-default">Cancelar</a>
                   <button type="submit" class="btn btn-primary">Crear</button>
                          
            </form>          
        </div>
@endsection