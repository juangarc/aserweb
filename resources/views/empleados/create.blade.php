@extends('layouts.default')

@section('content')
  <div class="container">
            <h2>Crear un nuevo Empleado </h2>
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
            <form method="post" action="{{ route('empleados.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Identificacion* </label>
                    <input type="number" name="id" class="form-control">
                    <label>Nombre* </label>
                    <input type="text" name="name" class="form-control">
                    <label>Apellido* </label>
                    <input type="text" name="apellido" class="form-control">
                    <label>Telefono* </label>
                    <input type="number" name="telefono" class="form-control">
                    <label>Correo Electronico* </label>
                    <input type="email" name="correoelectronico" class="form-control">
                    <label>Tipo de vinculacion* </label>
                    {{-- <input type="select" name="id_tipovinculacion" class="form-control"> --}}
                    <select name="id_tipovinculacion" id="id_tipovinculacion" class="form-control">
                        @foreach ($tipovinculaciones as $tipovinculacion) 
                        <option value="{{ $tipovinculacion['id'] }}">{{ $tipovinculacion['name'] }}</option>
                        @endforeach
                    </select>
                    <label>Fecha de nacimiento* </label>
                    <input type="date" name="fechadenacimiento" class="form-control">                   
                    <label>Salario* </label>
                    <input type="number" name="salario" class="form-control">
                    <label>Cargo* </label>
                    {{-- <input type="select" name="id_cargo" class="form-control"> --}}
                    <select name="id_cargo" id="id_cargo" class="form-control">
                        @foreach ($cargos as $cargo) 
                        <option value="{{ $cargo['id'] }}">{{ $cargo['name'] }}</option>
                        @endforeach
                    </select>
                    <label>Sede*</label>
                    {{-- <input type="select" name="id_sede" class="form-control"> --}}
                    <select name="id_sede" id="id_sede" class="form-control">
                        @foreach ($sedes as $sede) 
                        <option value="{{ $sede['id'] }}">{{ $sede['name'] }}</option>
                        @endforeach
                    </select>          
                    <label>Fehca de Ingreso*</label>
                    <input type="date" name="fechadeingreso" class="form-control">   
                    <label>Genero*</label>
                    <select name="genero" id="genero" class="form-control">
                    <option value="MASCULINO">MASCULINO</option>
                    <option value="FEMENINO">FEMENINO</option>
                    </select>                
                    <label>Estado*</label>
                    <select name="estado" id="estado" class="form-control">
                    <option value="ACTIVO">ACTIVO</option>
                    <option value="INACTIVO">INACTIVO</option>
                    </select>
                </div>
                <a href="{{ route('empleados.index') }}" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-primary">Crear</button>
            </form>
        </div>
@endsection