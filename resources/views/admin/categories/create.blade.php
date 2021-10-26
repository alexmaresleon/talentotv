@extends('adminlte::page')

@section('title', 'TalentoTV')

@section('content_header')
    <h1>Agregar nueva categoría</h1>
@stop

@section('content')    
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=> 'admin.categories.store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=> 'Nombre de la nueva categoría']) !!}

                @error('name')
                    <span class="text-danger">Procura que no se repita el nombre de la categoría o este vacio.</span>                    
                @enderror
            </div>
            {!! Form::submit('Crear categoría', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop