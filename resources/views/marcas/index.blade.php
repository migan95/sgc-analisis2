@extends('layouts.admin')

@section('title', 'Marca')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="container-fluid">
        <h2 class="mt-4">Marcas</h2>
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
            @foreach ($marcas as $marca)
                <tr>
                    <td class="txt-product">{{ $marca->nombre }}</td>
                    <td colspan="2" class="txt-product">
                        <form action="{{ route('marcas.destroy',$marca->id) }}" method="POST">
                            <a href="{{ route('marcas.show',$marca->id) }}"><i class="icon_user fas fa-eye"></i></a>
                            <a href="{{ route('marcas.edit',$marca->id) }}"><i class="icon_user fas fa-edit"></i></a>

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
