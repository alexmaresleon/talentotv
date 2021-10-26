@extends('adminlte::page')

@section('title', 'TalentoTV')

@section('content_header')
    <h1>Editar Precios</h1>
@stop

@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        {{session('info')}}
    </div>        
    @endif
<div class="card">
    <div class="card-body">
        {!! Form::model($price, ['route'=> ['admin.prices.update', $price], 'method'=> 'put']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Precio') !!}
            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=> 'Nuevo precio']) !!}

            @error('name')
                <span class="text-danger">Procura que no se repita el nombre del precio o este vacio.</span>                    
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('value', 'Valor') !!}
            {!! Form::number('value', null, ['class'=>'form-control', 'placeholder'=> 'Valor para la pasarela de pagos']) !!}

            @error('value')
            <span class="text-danger">Este campo solo acepta numeros y no puede estar vacio</span>                    
        @enderror
        </div>
            {!! Form::submit('Actualizar precio', ['class'=>'btn btn-primary']) !!}
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