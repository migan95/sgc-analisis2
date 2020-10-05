@extends('layouts.app')

@section('title', 'Editar usuario')

@section('sidebar')
    @parent

@endsection

@section('content')
    <h2>Editar usuario</h2>

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

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nombre</label>
        <input id="name" type="text" name="name" placeholder="Nombre" value="{{ $user->name }}">

        <label for="email">Correo</label>
        <input id="email" type="email" name="email" placeholder="Correo" value="{{ $user->email }}">

        <label for="password">Contraseña</label>
        <input id="password" type="password" name="password" placeholder="Contraseña" value="{{ $user->password }}">

        <input type="submit" value="Editar" />

    </form>
@endsection
