@extends('layouts.admin')

@section('title', 'Crear usuario')

@section('sidebar')
    @parent

@endsection

@section('content')
    <h2>Crear usuario</h2>

    @if ($errors->any())
        <div>
            <p>Por favor corregir los siguientes errores:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf


        <label for="name">Nombre</label>
        <input id="name" type="text" name="name" placeholder="Nombre">

        <label for="email">Correo</label>
        <input id="email" type="email" name="email" placeholder="Correo">

        <label for="password">Contraseña</label>
        <input id="password" type="password" name="password" placeholder="Contraseña">

        <input type="submit" value="Crear" />

    </form>
@endsection
