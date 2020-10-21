@extends('layouts.admin')

@section('title', 'Ver usuario')

@section('sidebar')
    @parent

@endsection

@section('content')
<div class="container-fluid">
    <h2 class="mt-4">Detalle de Usuario</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">
        </li>
    </ol>
    <div class="card-header">
    <div class="row">
                <div class="col-md-5">
                    <h4><button type="button" class="btn btn-outline-info" onclick="history.go(-1);"><i class="fas fa-arrow-circle-left"></i> </button> {{ $user->name }}</h4>
                </div>
                <div class="col-md-7 text-right">
                    <a href="{{ route('users.edit',$user->id) }}" class="btn btn-outline-success" >Editar <i class="fas fa-edit"></i></a> 
                </div>
            </div>
            </div>

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
