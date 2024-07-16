<?php

namespace App\Http\Controllers\Backend;

use App\Enum\Permissions;
use App\Models\SocialLinks;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SocialLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::user()->can(Permissions::SOCIAL_SHOW->value)) {
            abort('401');
        }
        $sLinks = SocialLinks::latest()->get();
        return view('admin.about.social.index', compact('sLinks'));
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
        if (!Auth::user()->can(Permissions::SOCIAL_ADD->value)) {
            abort('401');
        }
        $request->validate([
            'icon' => 'required|min:5',
            'link' => 'required|min:5|url'
        ]);

        SocialLinks::create([
            'icon' => $request->icon,
            'links' => $request->link,
        ]);

        toastr()->success('Social Link added Successfully.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        if (!Auth::user()->can(Permissions::SOCIAL_EDIT->value)) {
            abort('401');
        }
        $link = SocialLinks::findOrFail($id);
        return view('admin.about.social.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        if (!Auth::user()->can(Permissions::SOCIAL_EDIT->value)) {
            abort('401');
        }
        $link = SocialLinks::findOrFail($id);
        $request->validate([
            'icon' => 'required|min:5',
            'link' => 'required|min:5|url'
        ]);

        $link->icon = $request->icon;
        $link->links = $request->link;
        $link->save();

        toastr()->success('Social Link Updated Successfully.');
        return redirect()->route('admin.socials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        if (!Auth::user()->can(Permissions::SOCIAL_DELETE->value)) {
            abort('401');
        }
        $link = SocialLinks::findOrFail($id);

        $link->delete();


        toastr()->info('Social Link Deleted.');
        return redirect()->route('admin.socials.index');
    }
}
