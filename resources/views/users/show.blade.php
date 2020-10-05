@extends('layouts.admin')

@section('title', 'Ver usuario')

@section('sidebar')
    @parent

@endsection

@section('content')
    <h2>Detalle de usuario</h2>

    <strong>Nombre:</strong>
    <span>{{ $user->name }}</span>
    <strong>Correo:</strong>
    <span>{{ $user->email }}</span>
@endsection
