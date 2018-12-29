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
                        <option value="{{ $empleado['id'] }}">{{ $empleado['name']." ".$empleado['apellido'] }}</option>
                        @endforeach
                        </select>
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
                    <input type="text" name="tiempo_ausencia" class="form-control">
                    <label>Costo de Ausencia / $ </label>
                    <input  type="text" name="costo_ausencia" class="form-control">
                    <label>Grado* </label>
                    <select name="grado" id="grado" class="form-control">
                    <option value="LEVE">LEVE</option>
                    <option value="SEVERO">SEVERO</option>
                    </select>                
                    <label>Observacion* </label>
                    <input type="text" name="observacion" class="form-control">    
                    </div>
                    @section('scripts')
                    <script src="{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}"></script>
                    <script>
                    $(document).ready(function() {
                        $("#tiempo_ausencia, #costo_ausencia").stringToSlug({
                            callback: function(text){
                                $("#costo_ausencia").val(text);
                            }
                        });
                    });
                    </script>
                    @endsection
                    <a href="{{ route('ausentismos.index') }}" class="btn btn-default">Cancelar</a>
                   <button type="submit" class="btn btn-primary">Crear</button>       
            </form>          
        </div>
@endsection