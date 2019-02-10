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
                                    <input type="text" name="fecha_registro" value="{{$ausentismo->fecha_registro}}" id="fecha" class="form-control" >
                                    <!-- <input type="button" class="btn btn-primary" value="Buscar" onclick="dateCompare();">         -->
                            <input type="text" name="obsevacion" value="{{$ausentismo->observacion}}" id="cargo_title" class="form-control" >
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
     
     var Fecha2 = AnyoFecha+"-"+MesFecha+"-"+DiaFecha; 
    //  var Fecha3 = Date.parse(Fecha2);
    //  var Fecha4 = new Date(Fecha3);
    document.getElementById('cargo_title').value=Fecha2;
    console.log(Fecha2);
     
      
     var AnyoHoy = Hoy.getFullYear();
     var MesHoy = Hoy.getMonth();
     var DiaHoy = Hoy.getDate();

                  if (AnyoFecha >= AnyoHoy && MesFecha >= MesHoy && DiaFecha >= DiaHoy){
                      $('#botonProrroga').prop('disabled', false);
                     alert('Activar Boton');
                  }
                  else{
                      $('#botonProrroga').prop('disabled', true);
                     alert('Desactivar Boton');
                  }
    })
            </script>
        </section>
@endsection