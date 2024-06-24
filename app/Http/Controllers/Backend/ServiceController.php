<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display a listing of the Service.
     */
    public function index()
    {
        return redirect()->route('admin.home.service');
    }

    /**
     * Show the form for creating a new Service.
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created Service in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:100',
            'sub_title' => 'required|min:10|max:255',
            'icon' => 'required|min:5|max:50',
            'description' => 'required'
        ]);

        Service::insert([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'icon' => $request->icon,
            'description' => $request->description,
            'is_public' => (bool) $request->publish,
            'created_at' => Carbon::now(),
        ]);

        toastr()->success('Service Created Successfully.');
        return redirect('dashboard/services');
    }

    /**
     * Display the specified Service.
     */
    public function show(int $id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified Service.
     */
    public function edit(int $id)
    {
        $service = Service::findOrFail($id);
        return view('admin.service.edit', compact('service'));
    }

    /**
     * Update the specified Service in storage.
     */
    public function update(Request $request, int $id)
    {
        $service = Service::findOrFail($id);
        $request->validate([
            'title' => 'required|min:5|max:100',
            'sub_title' => 'required|min:10|max:255',
            'icon' => 'required|min:5|max:50',
            'description' => 'required'
        ]);

        $service->title = $request->title;
        $service->sub_title = $request->sub_title;
        $service->icon = $request->icon;
        $service->description = $request->description;
        $service->is_public = (bool) $request->publish;

        $service->save();


        toastr()->success('Service Updated Successfully.');
        return redirect()->route('admin.home.service');
    }

    /**
     * Remove the specified Service from storage.
     */
    public function destroy(int $id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        toastr()->error('Service Deleted.');
        return redirect()->route('admin.home.service');
    }

    /**
     * Showing Service details page to frontend
     *
     * @param integer $id
     */
    public function details(int $id)
    {
        $service = Service::findOrFail($id);
        if (!$service->is_public) {
            abort(404);
        }
        return view('admin.service.show', compact('service'));
    }
}
