@extends('adminlte::page')

@section('title', 'CreArte')

@section('content_header')
    <h1>CreArte</h1>
@stop

@section('content')
    <p>Bienvenido al Panel de Administrador</p>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop