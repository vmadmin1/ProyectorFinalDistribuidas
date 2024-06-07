<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    /**public function __construct()
    {
        $this->middleware('can:Listar role')->only('index');
        $this->middleware('can:Crear role')->only('create', 'store');
        $this->middleware('can:Editar role')->only('edit', 'update');
        $this->middleware('can:Eliminar role')->only('destroy');
    
    }*/

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'permissions' => 'required|array'
        ]);

        // Create the role with the guard_name 'web'
        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);

        // Sync permissions with the same guard_name
        $permissions = Permission::whereIn('id', $request->permissions)->get();
        $role->syncPermissions($permissions);

        return redirect()->route('admin.roles.index')->with('info', 'El Rol Se Creo Satisfactoriamente');
    }


    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('admin.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required',
            'permissions' => 'required|array'
        ]);
    
        $role->update([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);
    
        $permissions = Permission::whereIn('id', $request->permissions)->get();
        $role->syncPermissions($permissions);
    
        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index');
    }
}
