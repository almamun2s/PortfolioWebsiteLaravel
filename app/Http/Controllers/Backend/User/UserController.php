<?php

namespace App\Http\Controllers\Backend\User;

use App\Enum\Super;
use App\Models\User;
use App\Enum\Permissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::user()->can(Permissions::USER_SHOW->value)) {
            abort('401');
        }
        $users = User::get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort(404);
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
    public function edit(User $user)
    {
        if (!Auth::user()->can(Permissions::USER_EDIT->value)) {
            abort('401');
        }
        if ($user->hasRole(Super::Admin) && !Auth::user()->hasRole(Super::Admin)) {
            abort(401);
        }
        if (Auth::user()->hasRole(Super::Admin)) {
            $roles = Role::all();
        } else {
            $roles = Role::where('name', '!=', Super::Admin)->get();
        }
        if (Auth::user()->id == $user->id) {
            abort(404);
        }

        return view('admin.users.edit', compact(['user', 'roles']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if (!Auth::user()->can(Permissions::USER_EDIT->value)) {
            abort('401');
        }
        if ($user->hasRole(Super::Admin) && !Auth::user()->hasRole(Super::Admin)) {
            abort(401);
        }
        if (Auth::user()->id == $user->id) {
            abort(404);
        }
        // Validate the request
        $request->validate([
            'role' => 'exists:roles,name'
        ]);
        $user->syncRoles($request->role);

        toastr()->success('Role Assigned Successfully.');
        return redirect()->route('admin.users.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        abort(404);
    }
}
