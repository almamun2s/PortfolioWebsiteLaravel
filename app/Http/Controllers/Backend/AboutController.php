<?php

namespace App\Http\Controllers\Backend;

use App\Models\Home;
use App\Models\Status;
use App\Enum\Permissions;
use App\Models\SocialLinks;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::user()->can(Permissions::ABOUT->value)) {
            abort('401');
        }
        $data = Home::find(1);
        return view('admin.about.index', compact('data'));
    }

    /**
     * Showing frontpage
     */
    public function show_front()
    {
        $data = Home::find(1);
        $socials = SocialLinks::get();
        $statuses = Status::get();

        return view('frontend.about', compact(['data', 'socials', 'statuses']));
    }

    /**
     * Update About page
     *
     * @param Request $request
     */
    public function about_page_update(Request $request)
    {
        if (!Auth::user()->can(Permissions::ABOUT->value)) {
            abort('401');
        }
        $data = Home::find(1);
        $request->validate([
            'about_details' => 'required|min:20',
            'image' => 'image|mimes:png,jpg,jpeg,gif,webp|max:1024',
        ]);
        $data->about_details = $request->about_details;

        if ($request->file('image')) {
            $file = $request->file('image');

            // Renaming the file
            $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();

            // Uploading the file to upload directory
            $file->move('uploads', $fileName);

            // Resize the image and move
            $imageManager = new ImageManager(Driver::class);
            $image = $imageManager->read("uploads/$fileName");
            $image->resize(400, 400);
            $fileUpdatedName = hexdec(uniqid()) . '_400.' . $file->getClientOriginalExtension();
            $image->save(public_path('uploads/') . $fileUpdatedName);

            // Deleting image from upload directory
            unlink(public_path('uploads/' . $fileName));
            // Deleting Previous image if exists
            if (($data->about_image != null) && (file_exists(public_path('uploads/' . $data->about_image)))) {
                unlink(public_path('uploads/' . $data->about_image));
            }

            // Saving image name to DB
            $data->about_image = $fileUpdatedName;
        }

        $data->save();

        toastr()->success('About Page Updated Successfully.');
        return redirect()->back();

    }
}
