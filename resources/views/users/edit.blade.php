@extends('layouts.admin')

@section('title', 'Editar usuario')

@section('sidebar')
    @parent

@endsection

@section('content')

<div class="container-fluid">
    <h2 class="mt-4">Editar usuario: {{ $user->name }}</h2>
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
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="Nombre">Nombre</label>
                    <input  id="name" type="text" name="name" placeholder="Nombre" value="{{ $user->name }}" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="Correo">Correo</label>
                    <input id="email" type="email" name="email" placeholder="Correo" value="{{ $user->email }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="rol">Rol</label>
                    <select id="rol" name="role" class="custom-select">
                        <option value="1" {{ $user->role == 1 ? 'selected' : '' }}">Administrador</option>
                        <option value="2" {{ $user->role == 2 ? 'selected' : '' }}">Supervisor</option>
                        <option value="3" {{ $user->role == 3 ? 'selected' : '' }}">Cajero</option>
                    </select>
                </div>

                <button type="submit" value="Editar" class="btn btn-primary">Editar <i class="fas fa-edit"></i></button>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection
