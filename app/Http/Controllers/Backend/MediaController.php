<?php

namespace App\Http\Controllers\Backend;

use App\Enum\Permissions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::user()->can(Permissions::MEDIA_SHOW->value)) {
            abort(401);
        }
        $path = PUBLIC_PATH . 'uploads';
        $fileDetails = [];
        if (File::exists($path)) {
            $files = File::allFiles($path);
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
        if (!Auth::user()->can(Permissions::MEDIA_ADD->value)) {
            abort(401);
        }
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
        if (!Auth::user()->can(Permissions::MEDIA_DELETE->value)) {
            abort(401);
        }
        if ($file = PUBLIC_PATH . 'uploads/' . $request->img) {
            unlink($file);

            toastr()->info('Photos Deleted.');
            return redirect()->back();
        }
        toastr()->info('Photos Not found.');
        return redirect()->back();
    }
}
