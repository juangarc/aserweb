@extends('layouts.default')

@section('content')
  <div class="container">
            <h2>Crear un nuevo Tipo de Examen </h2>
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
            <form method="post" action="{{ route('tipoexamen.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Nombre* </label>
                    <input type="text" name="name" class="form-control">
                </div>
                <a href="{{ route('tipoexamen.index') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
@endsection