@extends('adminlte::page')

@section('title', 'TalentoTV')

@section('content_header')
    <h1>Administración de Usuarios</h1>
@stop

@section('content')
    @livewire('admin.users-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop