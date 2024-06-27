<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::get();
        // dd($portfolios);
        return view('admin.dashboard', compact(['portfolios']));
    }
}
