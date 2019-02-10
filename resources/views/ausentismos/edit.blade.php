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
                            <h3 class="panel-title">Editar Ausentismo : {{$ausentismo->id}}</h3>
                    </div>
                    <div class="panel-body">
            
                    
                        <div class="table-container">
                            <form method="POST" action="{{ route('ausentismos.update', $ausentismo->id) }}"  role="form">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label>Fecha Registro* </label>
                            <input type="date" name="fecha_registro" value="{{$ausentismo->fecha_registro}}" id="fecha" class="form-control" >
                                </div>    
                                <div class="form-group">
                                    <label>Identificacion del empleado* </label>
                            <input type="number" name="id_empleado" value="{{$ausentismo->id_empleado}}" id="codigo" class="form-control" >
                            <input type="button" class="btn btn-primary" value="Buscar" onclick="getMessage();">
                            <br>
                                </div>
                                <div class="form-group">
                                    <label>Nombre del empleado* </label>
                            {{-- <input type="text" name="nameEmpleado" value="{{$ausentismo->nameEmpleado . " " . $ausentismo->apellidoEmpleado}}" id="id_empleado" class="form-control" > --}}
                            <input type="text" name="id_ident" class="form-control" id="id_emple">
                                </div> 
                                <div class="form-group">
                                    <label>Tipo de ausencia* </label>
                            <select name="id_tipoausentismo" id="id_tipoausentismo" class="form-control">
                                    @foreach ($tipoausentismos as $tipoausentismo) 
                                    <option value="{{ $tipoausentismo['id'] }}">{{ $tipoausentismo['name'] }}</option>
                                    @endforeach
                                    </select>
                            </div> 
                                <div class="form-group">
                                    <label>Fecha Inicio* </label>
                            <input type="date" name="fecha_inicio" value="{{$ausentismo->fecha_inicio}}" id="ausentismos_title" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Fecha Final* </label>
                            <input type="text" name="fecha_final" value="" id="final_title" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Tiempo* </label>
                            <input type="text" name="tiempo_ausencia" value="{{$ausentismo->tiempo_ausencia}}" id="ausentismos_title" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Costo* </label>
                            <input type="number" name=">costo_ausencia" value="{{$ausentismo->costo_ausencia}}" id="ausentismos_title" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Grado* </label>
                            <input type="text" name="Grado" value="{{$ausentismo->Grado}}" id="ausentismos_title" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Observacion* </label>
                            <input type="text" name="observacion" value="{{$ausentismo->observacion}}" id="cargo_title" class="form-control" >
                                </div>
                            </div>  

                         <div class="row">
                            
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <input type="submit"  value="Editar" class="btn btn-success">
                                <a href="{{ route('ausentismos.index') }}" class="btn btn-info" >Atras</a>
                            </div>  
                            
                         </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" class="btn btn-info" id="botonProrroga" >Anadir Prorroga</a>
            <script>
     $(document).ready(function() {
        var fecha_aux = document.getElementById("fecha").value.split("-");
    var Fecha1 = new Date(parseInt(fecha_aux[0]),parseInt(fecha_aux[1]-1),parseInt(fecha_aux[2]));
    //  console.log(Fecha1.setDate(Fecha1.getDate + 5));
     Hoy = new Date();//Fecha actual del sistema

     var diasAnadir = 5;

     var AnyoFecha = Fecha1.getFullYear();
     var MesFecha = Fecha1.getMonth() + 1;
     var DiaFecha = Fecha1.getDate() + diasAnadir;
     
     var Fecha2 = DiaFecha+"/"+MesFecha+"/"+AnyoFecha; 
    //  var Fecha3 = Date.parse(Fecha2);
    //  var Fecha4 = new Date(Fecha3);
     document.getElementById('final_title').value=Fecha2;
    console.log(Fecha2);
     
      
     var AnyoHoy = Hoy.getFullYear();
     var MesHoy = Hoy.getMonth();
     var DiaHoy = Hoy.getDate();

     var producto1 = document.getElementById('botonProrroga');
                 if (AnyoFecha >= AnyoHoy && MesFecha >= MesHoy && DiaFecha >= DiaHoy){
                    producto1.style.display = 'inline';
                 }
                 else{
                    producto1.style.display = 'none';
                 }
    })
            </script>
        </section>
@endsection