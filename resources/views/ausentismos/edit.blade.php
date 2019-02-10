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
                                    <input type="button" class="btn btn-primary" value="Buscar" onclick="dateCompare();">        
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
            <script>
     $(document).ready(function() {
        // alert("documento listo");    
})
            </script>
        </section>
@endsection