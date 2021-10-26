@extends('adminlte::page')

@section('title', 'TalentoTV')

@section('content_header')
    <h1><strong> Observaciones del Curso:</strong> {{$course->title}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => ['admin.courses.reject', $course]]) !!}
            <div class="form-group">
                {!! Form::label('body', 'Observaciones del curso: ') !!}
                {!! Form::textarea('body', null) !!}

                @error('body')
                <strong class="text-danger text-sm"> Es obligatorio agregar observaciones sobre el curso </strong>
                    
                @enderror
            </div>
            {!! Form::submit('Enviar observaciones', ['class'=> 'btn btn-primary ']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@stop