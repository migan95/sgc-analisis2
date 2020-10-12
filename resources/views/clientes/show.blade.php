@extends('layouts.admin')

@section('title', 'Ver cliente')

@section('sidebar')
    @parent

@endsection

@section('content')
    <h2>Detalle de cliente</h2>

    <strong>Nombre:</strong>
    <span>{{ $cliente->nombre }}</span>

    <strong>Apellido:</strong>
    <span>{{ $cliente->apellido }}</span>

    <strong>Telefono:</strong>
    <span>{{ $cliente->telefono }}</span>

    <strong>Correo:</strong>
    <span>{{ $cliente->correo }}</span>

    <strong>Direccion:</strong>
    <span>{{ $cliente->direccion }}</span>

    <strong>Nit:</strong>
    <span>{{ $cliente->nit }}</span>
@endsection
