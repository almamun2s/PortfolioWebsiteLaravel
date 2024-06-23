<?php

namespace App\Http\Controllers\Backend;

use App\Models\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    private $homeData;
    public function __construct()
    {
        $this->homeData = Home::find(1);
    }

    public function index()
    {
        return view('frontend.index', ['data' => $this->homeData,]);
    }

    public function banner()
    {
        return view('admin.home.banner', ['data' => $this->homeData]);
    }

    public function banner_update(Request $request)
    {
        $this->homeData->hi = $request->hi;
        $this->homeData->name = $request->name;
        $this->homeData->title = $request->title;
        $this->homeData->description = $request->description;

        $this->homeData->save();

        return redirect()->back();
    }
}
