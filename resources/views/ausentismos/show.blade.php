@extends ('layouts.default')

@section('content')
 <div class="container">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2> Ausentismos</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('ausentimos.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Codigo:</strong>
                        {{ $ausentismo->id }}
                    </div>
                    <!-- <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $ausentismo->fecha_registro }}
                    </div>
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $ausentismo->id_iden }}
                    </div>
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $ausentismo->id_empleado }}
                    </div>
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $ausentismo->nameTipoausentismo }}
                    </div>
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $ausentismo->nameCargo }}
                    </div>
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $ausentismo->fecha_inicio }}
                    </div>
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $ausentismo->tiempo_ausencia }}
                    </div>
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $ausentismo->costo }}
                    </div>
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $ausentismo->Grado }}
                    </div>
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $ausentismo->observacion }}
                    </div> -->
                    <td>
                        <a href="" class="btn btn-success">+ Prorroga<a>
                    </td>
                </div>
            </div>
@endsection