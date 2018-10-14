@extends('layouts.default')

@section('content')
  <div class="container">
            <h2>Crear un nuevo Tipo de especialidad </h2>
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
            <form method="post" action="{{ route('tipoespecialidad.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Nombre* </label>
                    <input type="text" name="name" class="form-control">
                </div>
                <a href="{{ route('tipoespecialidad.index') }}" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-primary">Crear</button>
            </form>
        </div>
@endsection