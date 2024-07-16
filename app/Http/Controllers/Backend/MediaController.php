<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Define the path to the uploads directory
        $path = public_path('uploads');

        // Initialize an array to store file details
        $fileDetails = [];

        // Check if the directory exists
        if (File::exists($path)) {
            // Get all files in the directory
            $files = File::allFiles($path);

            // Loop through each file and get its name and extension
            foreach ($files as $file) {
                $fileDetails[] = [
                    'name' => $file->getRelativePathname(),
                ];
            }
        }
        return view('admin.media.index', compact('fileDetails'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $images = $request->file('image');

        foreach ($images as $image) {
            $fileName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move('uploads', $fileName);
        }

        toastr()->success('Photos uploaded.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if ($file = public_path('uploads/' . $request->img)) {
            unlink($file);

            toastr()->info('Photos Deleted.');
            return redirect()->back();
        }
        toastr()->info('Photos Not found.');
        return redirect()->back(); 
    }
}
