@extends('adminlte::page')

@section('title', 'Loremket-Admin')

@section('content_header')
    <h1>Listado de productos</h1>
@stop

@section('content')
    @livewire('admin.products-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
