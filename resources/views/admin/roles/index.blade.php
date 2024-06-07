@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Lista de Roles</h1>
@stop

@section('content')
    <div class="bg-white shadow-lg rounded overflow-hidden">
        <div class="px-6 py-4">
            <a href="{{ route('admin.roles.create') }}" class="btn btn-primary mb-3">Crear Nuevo Rol</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-info">Editar</a>
                                <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este rol?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
