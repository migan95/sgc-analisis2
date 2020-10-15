@extends('layouts.admin')

@section('title', 'Ver usuario')

@section('sidebar')
    @parent

@endsection

@section('content')
<div class="container-fluid">
    <h2 class="mt-4">Detalle de usuario: {{ $user->name }}</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">
        </li>
    </ol>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role == 1 ? 'Administrador' : ($user->role == 2 ? 'Supervisor' : 'Cajero') }}</td>
                        </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6"></div>
    </div>
</div>
@endsection
