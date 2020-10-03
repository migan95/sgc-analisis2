@extends('layouts.app')

@section('title', 'Dashboard')

@section('sidebar')
    @parent

@endsection

@section('content')
    <form method="POST" action="/login">
        @csrf
        <p>{{ $mensaje ?? '' }}</p>

        <label for="email">Correo:</label>
        <input id="email" name="email" type="email">

        <label for="password">Contraseña:</label>
        <input id="password" name="password" type="password">

        <input type="submit" value="Ingresar">

    </form>
@endsection
