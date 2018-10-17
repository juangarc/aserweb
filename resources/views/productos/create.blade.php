@extends('layouts.default')

@section('content')
  <div class="container">
            <h2>Crear un nuevo Producto </h2>
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
            <form method="post" action="{{ route('productos.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Codigo* </label>
                    <input type="number" name="id" class="form-control">
                    <label>Nombre* </label>
                    <input type="text" name="name" class="form-control">
                    <label>Fecha de inicio* </label>
                    <input type="date" name="fechainicio" class="form-control">
                    <label>Fecha de Vencimiento* </label>
                    <input type="date" name="fechafinal" class="form-control">
                    <label>Valor* </label>
                    <input type="number" name="valor" class="form-control">
                </div>
                <a href="{{ route('productos.index') }}" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-primary">Crear</button>
            </form>
        </div>
@endsection