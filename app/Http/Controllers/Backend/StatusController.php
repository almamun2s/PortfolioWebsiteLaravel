<?php

namespace App\Http\Controllers\Backend;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Enum\Status as StatusEnum;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Enum;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = StatusEnum::cases();
        $allStatus = Status::latest()->get();
        return view('admin.about.status.index', compact(['positions', 'allStatus']));
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
        $request->validate([
            'name' => 'required',
            'value' => 'required',
            'position' => ['required', new Enum(StatusEnum::class)],
        ]);

        Status::create([
            'name' => $request->name,
            'curr_value' => $request->value,
            'position' => $request->position,
        ]);

        toastr()->success('Status added Successfully.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status)
    {
        $positions = StatusEnum::cases();
        return view('admin.about.status.edit', compact(['status', 'positions']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Status $status)
    {
        $request->validate([
            'name' => 'required',
            'value' => 'required',
            'position' => ['required', new Enum(StatusEnum::class)],
        ]);

        $status->name = $request->name;
        $status->curr_value = $request->value;
        $status->position = $request->position;

        $status->save();

        toastr()->success('Status Updated Successfully.');
        return redirect()->route('admin.status.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        $status->delete();
        
        toastr()->info('Status Deleted.');
        return redirect()->route('admin.status.index');
    }
}
