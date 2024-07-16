<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Home;
use App\Models\Category;
use App\Enum\Permissions;
use App\Models\Portfolio;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Drivers\Gd\Driver;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::user()->can(Permissions::PORTFOLIO_SHOW->value)) {
            abort('401');
        }
        $portfolios = Portfolio::latest()->get();
        return view('admin.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->can(Permissions::PORTFOLIO_ADD->value)) {
            abort('401');
        }

        $categories = Category::latest()->get();
        return view('admin.portfolio.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can(Permissions::PORTFOLIO_ADD->value)) {
            abort('401');
        }
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
            'is_public' => (bool) $request->publish,
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
    public function show(int $id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        if (!Auth::user()->can(Permissions::PORTFOLIO_EDIT->value)) {
            abort('401');
        }
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        if (!Auth::user()->can(Permissions::PORTFOLIO_EDIT->value)) {
            abort('401');
        }
        $portfolio = Portfolio::findOrFail($id);
        $otherPortfolio = Portfolio::where('id', '!=', $id)->get();

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
        foreach ($otherPortfolio as $other) {
            if ($other->slug == $request->slug) {
                return redirect()->back()->withErrors(['slug' => 'That slug is taken']);
            }
        }
        // Saving data to DB
        $portfolio->title = $request->title;
        $portfolio->slug = $request->slug;
        $portfolio->details = $request->details;
        $portfolio->tags = $request->tags;
        $portfolio->is_public = (bool) $request->publish;

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
            // Deleting Previous image if exists
            if (($portfolio->image != null) && (file_exists(public_path('uploads/portfolios/' . $portfolio->image)))) {
                unlink(public_path('uploads/portfolios/' . $portfolio->image));
            }

            // Saving image name to DB
            $portfolio->image = $fileName;
        }


        $categories = explode(',', $request->categories);
        $categories = array_map('intval', $categories);
        $portfolio->categories()->sync($categories);
        $portfolio->save();

        toastr()->success('Portfolio Updated Successfully.');
        return redirect()->route('admin.portfolios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        if (!Auth::user()->can(Permissions::PORTFOLIO_DELETE->value)) {
            abort('401');
        }
        $portfolio = Portfolio::findOrFail($id);
        // Deleting Previous image if exists
        if (($portfolio->image != null) && (file_exists(public_path('uploads/portfolios/' . $portfolio->image)))) {
            unlink(public_path('uploads/portfolios/' . $portfolio->image));
        }
        $portfolio->delete();

        toastr()->info('Portfolio Deleted.');
        return redirect()->route('admin.portfolios.index');
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


    /**
     * This method is for showing portfolios in frontend
     */
    public function portfolios()
    {
        $data = Home::find(1);
        $portfolioTitle = $data->portfolio_title;
        $pageTitle = 'Portfolio';

        $portfolios = Portfolio::where('is_public', 1)->latest()->paginate($data->portfolio_count * 2);

        return view('frontend.portfolio', compact(['portfolios', 'portfolioTitle', 'pageTitle']));
    }

    /**
     * This methor is for showing Single Portfolio page 
     *
     * @param string $slug
     */
    public function single_portfolio(string $slug)
    {
        $portfolio = Portfolio::where('slug', $slug)->where('is_public', 1)->firstOrFail();

        $sessionKey = 'portfolio_' . $portfolio->id;
        if (!Session::has($sessionKey)) {
            $portfolio->increment('views');
            Session::put($sessionKey, 1);
        }

        return view('frontend.portfolio_details', compact('portfolio'));
    }
}
