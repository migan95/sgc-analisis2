@extends('layouts.admin')

@section('title', 'Usuarios')

@section('sidebar')
    @parent

@endsection

@section('content')
<div class="container-fluid">
    <h2 class="mt-4">Usuarios</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{ $mensaje ?? '' }}</li>
    </ol>
    <table class="table table-hover">
        <thead>
            <tr>    
                <th>Nombre</th>
                <th>Correo</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                            <a href="{{ route('users.show',$user->id) }}"><i class="icon_user fas fa-eye"></i></a>
                            <a href="{{ route('users.edit',$user->id) }}"><i class="icon_user fas fa-edit"></i></a>

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn_eliminar_user"><i class="icon_user fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
