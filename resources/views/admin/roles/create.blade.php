@extends('adminlte::page')

@section('title', 'CreArte')

@section('content_header')
    <h1>Crear Nuevo Rol</h1>
@stop

@section('content')
    <div class="bg-white shadow-lg rounded overflow-hidden">
        <div class="px-6 py-4">
            <form action="{{ route('admin.roles.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Escriba un nombre" value="{{ old('name') }}">
                    @error('name')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <strong>Permisos</strong>

                @error('permissions')
                    <small class="text-danger">
                        <strong>{{ $message }}</strong>
                    </small>
                    <br>
                @enderror

                @foreach ($permissions as $permission)
                    <div>
                        <label>
                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="mr-1">
                            {{ $permission->name }}
                        </label>
                    </div>
                @endforeach

                <button type="submit" class="btn btn-primary mt-2">Crear Rol</button>
            </form>
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
