@extends('layouts.admin')

@section('title', 'Crear usuario')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
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
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input id="name" type="text" name="name" placeholder="Nombre" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Correo</label>
                    <input id="email" type="email" name="email" placeholder="Correo" class="form-control">
                </div>
                <div class="form-group">
                    <label for="rol">Rol</label>
                    <select id="rol" name="role" class="custom-select">
                        <option value="1">Administrador</option>
                        <option value="2">Supervisor</option>
                        <option value="3">Cajero</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" name="password" placeholder="Contraseña" class="form-control">
                </div>
                <button type="submit" value="Crear" class="btn btn-primary">Crear <i class="fas fa-user-plus"></i>
                </button>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
