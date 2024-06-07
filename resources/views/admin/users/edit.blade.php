@extends('adminlte::page')

@section('title', 'CreArte')

@section('content_header')
    <h1>Asignar un Rol</h1>
@stop

@section('content')
    <div class="bg-white shadow-lg rounded overflow-hidden">
        <div class="px-6 py-4">
            <h1 class="h5">Nombre</h1>
            <p class="form-control">{{$user->name}}</p>
        </div>
        <h1 class="h5">
            Lista de Roles
        </h1>
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            @foreach ($roles as $role)
                <div>
                    <label>
                        <input type="checkbox" name="roles[]" value="{{ $role->id }}" class="mr-1" {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
                        {{ $role->name }}
                    </label>
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary mt-2">Asignar Rol</button>
        </form>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
