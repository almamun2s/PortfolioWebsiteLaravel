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
        $services = Service::latest()->get();
        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new Service.
     */
    public function create()
    {
        // dd('create');
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

        toastr()->success('Service added Successfully.');
        return redirect('dashboard/services');
    }

    /**
     * Display the specified Service.
     */
    public function show(string $id)
    {
        dd('show');

    }

    /**
     * Show the form for editing the specified Service.
     */
    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        return view('admin.service.edit', compact('service'));
    }

    /**
     * Update the specified Service in storage.
     */
    public function update(Request $request, string $id)
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
        return redirect('dashboard/services');
    }

    /**
     * Remove the specified Service from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        toastr()->error('Service Deleted.');
        return redirect('dashboard/services');
    }
}
