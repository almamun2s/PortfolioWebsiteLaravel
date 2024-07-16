<?php

namespace App\Http\Controllers\Backend;

use App\Models\Process;
use App\Enum\Permissions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProcessController extends Controller
{
    /**
     * Display a listing of the Process.
     */
    public function index()
    {
        return redirect()->route('admin.home.process');
    }

    /**
     * Show the form for creating a new Process.
     */
    public function create()
    {
        if (!Auth::user()->can(Permissions::PROCESS_ADD->value)) {
            abort('401');
        }
        return view('admin.process.create');
    }

    /**
     * Store a newly created Process in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can(Permissions::PROCESS_ADD->value)) {
            abort('401');
        }
        $request->validate([
            'name' => 'required|min:3',
            'icon' => 'required|min:6',
            'description' => 'required|min:10',
            'serial' => 'unique:processes,serial',
        ]);

        Process::insert([
            'name' => $request->name,
            'icon' => $request->icon,
            'description' => $request->description,
            'serial' => $request->serial,
        ]);

        toastr()->success('Process created Successfully.');
        return redirect()->route('admin.home.processes.index');
    }

    /**
     * Display the specified Process.
     */
    public function show(int $id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified Process.
     */
    public function edit(int $id)
    {
        if (!Auth::user()->can(Permissions::PROCESS_EDIT->value)) {
            abort('401');
        }
        $process = Process::findOrFail($id);
        return view('admin.process.edit', compact('process'));
    }

    /**
     * Update the specified Process in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Auth::user()->can(Permissions::PROCESS_EDIT->value)) {
            abort('401');
        }
        $process = Process::findOrFail($id);

        $otherProcess = Process::where('id', '!=', $id)->get();
        $request->validate([
            'name' => 'required|min:3',
            'icon' => 'required|min:6',
            'description' => 'required|min:10',
        ]);
        foreach ($otherProcess as $oProcess) {
            if ($oProcess->serial == $request->serial) {
                return redirect()->back()->withErrors(['serial' => 'This serial is taken']);
            }
        }

        $process->name = $request->name;
        $process->icon = $request->icon;
        $process->description = $request->description;
        $process->serial = $request->serial;

        $process->save();

        toastr()->success('Process Updated Successfully.');
        return redirect()->route('admin.home.processes.index');
    }

    /**
     * Remove the specified Process from storage.
     */
    public function destroy(int $id)
    {
        if (!Auth::user()->can(Permissions::PROCESS_DELETE->value)) {
            abort('401');
        }
        $process = Process::findOrFail($id);
        $process->delete();

        toastr()->error('Process Deleted.');
        return redirect()->route('admin.home.processes.index');
    }
}
