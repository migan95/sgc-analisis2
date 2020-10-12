@extends('layouts.admin')

@section('title', 'Crear usuario')

@section('sidebar')
    @parent

@endsection

@section('content')
<div class="container-fluid">
    <h2 class="mt-4">Crear Nuevo Usuario</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">
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
        </li>
    </ol>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label for="name">Nombre</label>
        <input id="name" type="text" name="name" placeholder="Nombre">

        <label for="email">Correo</label>
        <input id="email" type="email" name="email" placeholder="Correo">

        <label for="password">Contraseña</label>
        <input id="password" type="password" name="password" placeholder="Contraseña">

        <button type="submit" value="Crear" class="">Crear <i class="fas fa-user-plus"></i></button>

    </form>
</div>
@endsection
