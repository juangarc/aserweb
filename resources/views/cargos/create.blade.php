@extends('layouts.default')

@section('content')
  <div class="container">
            <h2>Crear un nuevo Cargo </h2>
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
            <form method="post" action="{{ route('cargos.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Cargo* </label>
                    <input type="text" name="name" class="form-control">
                </div>
                <a href="{{ route('cargos.index') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
@endsection