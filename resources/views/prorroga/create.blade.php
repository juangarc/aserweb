@extends('layouts.default')

@section('content')
  <div class="container">
            <h2>Agregar prorroga </h2>
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
            <form method="post" action="{{ route('prorrogas.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Cantidad de Dias* </label>
                    <input type="number" name="cantidad_dia_prorroga" class="form-control">
                </div>
                <div class="form-group">
                    <label>Fecha de incio* </label>
                    <input type="date" name="fechainicio" class="form-control">
                </div>
                <div class="form-group">
                    <label>Incapacidad* </label>
                    <select name="incapacidad" id="incapacidad" class="from-control">
                    <option value="PERMANENTE">PERMANENTE</option>
                    <option value="PARCIAL">PARCIAL</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>%Incapacidad* </label>
                    <input type="number" name="%incapacidad" class="form-control">
                </div>
                <div class="form-group">
                    <label>Seguimiento de incapacidad* </label>
                    <input type="text" name="seguimiento_incapacidad" class="form-control">
                </div>
                <a href="{{ route('ausentismos.index') }}" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-primary">Crear</button>
            </form>
        </div>
@endsection