<?php

namespace App\Http\Controllers\Backend;

use App\Models\Home;
use App\Models\Category;
use App\Enum\Permissions;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the Category.
     */
    public function index()
    {
        if (!Auth::user()->can(Permissions::CATEGORY_SHOW->value)) {
            abort('401');
        }
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new Category.
     */
    public function create()
    {
        if (!Auth::user()->can(Permissions::CATEGORY_ADD->value)) {
            abort('401');
        }
        return view('admin.category.create');
    }

    /**
     * Store a newly created Category in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can(Permissions::CATEGORY_ADD->value)) {
            abort('401');
        }
        $request->validate([
            'name' => 'required|min:3',
        ]);

        $slug = $this->make_slug($request->name);

        Category::insert([
            'name' => $request->name,
            'slug' => $slug,
            'is_public' => (bool) $request->publish,
        ]);

        toastr()->success('Category created Successfully.');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified Category.
     */
    public function show(int $id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified Category.
     */
    public function edit(int $id)
    {
        if (!Auth::user()->can(Permissions::CATEGORY_EDIT->value)) {
            abort('401');
        }
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified Category in storage.
     */
    public function update(Request $request, int $id)
    {
        if (!Auth::user()->can(Permissions::CATEGORY_EDIT->value)) {
            abort('401');
        }
        $category = Category::findOrFail($id);
        $otherCategory = Category::where('id', '!=', $id)->get();
        $request->validate([
            'name' => 'required|min:3',
        ]);
        foreach ($otherCategory as $other) {
            if ($other->slug == $request->slug) {
                return redirect()->back()->withErrors(['slug' => 'That slug is taken']);
            }
        }
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->is_public = (bool) $request->publish;

        $category->save();

        toastr()->success('Category Updated Successfully.');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified Category from storage.
     */
    public function destroy(int $id)
    {
        if (!Auth::user()->can(Permissions::CATEGORY_DELETE->value)) {
            abort('401');
        }
        $category = Category::findOrFail($id);
        $category->delete();

        toastr()->info('Category Deleted.');
        return redirect()->route('admin.categories.index');
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
        while (Category::where('slug', $slug)->exists()) {
            $slug = $slug . $i;
            $i++;
        }
        return $slug;
    }

    /**
     * This function is for getting all categories by json format
     */
    public function get_categories()
    {
        header('Content-Type: application/json');

        $categories = Category::latest()->get();

        return json_encode($categories);
    }

    public function category_portfolio(string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $data = Home::find(1);

        $pageTitle = 'Category';
        $portfolioTitle = $category->name;
        $portfolios = $category->portfolios()->paginate($data->portfolio_count);

        return view('frontend.portfolio', compact(['portfolios', 'portfolioTitle', 'pageTitle']));
    }
}
