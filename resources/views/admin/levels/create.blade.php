@extends('adminlte::page')

@section('title', 'TalentoTV')

@section('content_header')
    <h1>Agregar nuevo nivel</h1>
@stop

@section('content')    
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=> 'admin.levels.store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=> 'Nombre del nuevo nivel']) !!}

                @error('name')
                    <span class="text-danger">Procura que no se repita el nombre del nivel o este vacio.</span>                    
                @enderror
            </div>
            {!! Form::submit('Crear nivel', ['class'=>'btn btn-primary']) !!}
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