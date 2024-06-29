<?php

namespace App\Http\Controllers\Backend\User;

use App\Enum\Super;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::user()->can('role.show')) {
            abort('401');
        }
        $roles = Role::where('name', '!=', Super::Admin)->get();
        return view('admin.users.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->can('role.add')) {
            abort('401');
        }

        return view('admin.users.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('role.add')) {
            abort('401');
        }
        $request->validate([
            'name' => 'required|min:3|max:50|unique:roles,name',
        ]);

        Role::create([
            'name' => $request->name,
        ]);

        toastr()->success('Role added Successfully.');
        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        if (!Auth::user()->canAny(['role.edit', 'role.permission'])) {
            abort('401');
        }
        $permissions = Permission::orderBy('name')->get();
        return view('admin.users.roles.edit', compact(['role', 'permissions']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        if (!Auth::user()->can('role.edit')) {
            abort('401');
        }
        $request->validate([
            'name' => 'required|min:3|max:50',
        ]);

        $role->name = $request->name;
        $role->save();

        toastr()->success('Role Updated Successfully.');
        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        if (!Auth::user()->can('role.delete')) {
            abort('401');
        }
        $role->delete();

        toastr()->info('Role Deleted.');
        return redirect()->route('admin.roles.index');
    }

    public function roles_permissions(Request $request, Role $role)
    {
        if (!Auth::user()->can('role.permission')) {
            abort('401');
        }
        $role->syncPermissions($request->permission);

        toastr()->success('Role Updated Successfully.');
        return redirect()->route('admin.roles.index');
    }
}
