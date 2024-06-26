<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::latest()->get();
        return view('admin.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('admin.portfolio.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5',
            'details' => 'required|min:10',
            'tags' => 'required',
            'categories' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg,gif,webp|max:1024',
        ], [
            'title.required' => 'Please write a title.',
            'title.min' => 'Title should be minimum 5 charactors.',
            'details.required' => 'Please provide Portfolio Description.',
            'details.min' => 'Description should be minimum 10 charactors.',
            'tags.required' => 'Please provide at least 1 tag.',
            'categories.required' => 'Portfolio should have at least 1 category.',
        ]);

        $fileName = null;
        if ($request->file('image')) {
            $file = $request->file('image');

            // Renaming the file
            $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            if (!file_exists(public_path('uploads/portfolios'))) {
                mkdir(public_path('uploads/portfolios'));
            }
            // Uploading the file to upload directory
            $file->move('uploads', $fileName);

            // Resize the image and move
            $imageManager = new ImageManager(Driver::class);
            $image = $imageManager->read("uploads/$fileName");
            $image->resize(1140, 760);
            $image->save(public_path('uploads/portfolios/') . $fileName);

            // Deleting image from upload directory
            unlink(public_path('uploads/' . $fileName));
        }

        $portfolio = Portfolio::create([
            'title' => $request->title,
            'slug' => $this->make_slug($request->title),
            'details' => $request->details,
            'tags' => $request->tags,
            'image' => $fileName,
            'created_at' => Carbon::now(),
        ]);

        $categories = explode(',', $request->categories);
        $categories = array_map('intval', $categories);
        $portfolio->categories()->attach($categories);

        toastr()->success('Portfolio Uploaded Successfully.');
        return redirect()->route('admin.portfolios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Make a slug from text
     *
     * @param string $text
     * @return string
     */
    private function make_slug(string $text): string
    {
        $slug = Str::slug($text);
        $i = 1;
        while (Portfolio::where('slug', $slug)->exists()) {
            $slug = $slug . $i;
            $i++;
        }
        return $slug;
    }
}
