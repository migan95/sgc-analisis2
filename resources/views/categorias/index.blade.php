@extends('layouts.admin')

@section('title', 'Categoria')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="container-fluid">
        <h2 class="mt-4">Categorias</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">{{ $mensaje ?? '' }}</li>
        </ol>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Acción</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td class="txt-product">{{ $categoria->nombre }}</td>
                    <td colspan="2" class="txt-product">
                        <form action="{{ route('categorias.destroy',$categoria->id) }}" method="POST">
                            <a href="{{ route('categorias.show',$categoria->id) }}"><i class="icon_user fas fa-eye"></i></a>
                            <a href="{{ route('categorias.edit',$categoria->id) }}"><i class="icon_user fas fa-edit"></i></a>

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
