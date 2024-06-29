<?php

namespace App\Http\Controllers\Backend\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::user()->can('permission')) {
            abort('401');
        }
        $permissions = Permission::orderBy('name')->get();
        return view('admin.users.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->can('permission')) {
            abort('401');
        }
        return view('admin.users.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('permission')) {
            abort('401');
        }
        $request->validate([
            'name' => 'required|min:3|max:50',
        ]);

        Permission::create([
            'name' => $request->name,
        ]);

        toastr()->success('Permission added Successfully.');
        return redirect()->route('admin.permissions.index');
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
    public function edit(Permission $permission)
    {
        if (!Auth::user()->can('permission')) {
            abort('401');
        }
        return view('admin.users.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        if (!Auth::user()->can('permission')) {
            abort('401');
        }
        $request->validate([
            'name' => 'required|min:3|max:50',
        ]);

        $permission->name = $request->name;
        $permission->save();

        toastr()->success('Permission Updated Successfully.');
        return redirect()->route('admin.permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        if (!Auth::user()->can('permission')) {
            abort('401');
        }
        $permission->delete();

        toastr()->info('Permission Deleted.');
        return redirect()->route('admin.permissions.index');
    }
}
