<?php

namespace App\Http\Controllers\Backend;

use App\Models\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * This variable stores Home data as Models
     */
    private $homeData;

    /**
     * Construct function of Home Controller
     */
    public function __construct()
    {
        $this->homeData = Home::find(1);
    }

    /**
     * Showing frontend Home page
     */
    public function index()
    {
        return view('frontend.index', ['data' => $this->homeData,]);
    }

    /**
     * Showing banner page to admin
     */
    public function banner()
    {
        return view('admin.home.banner', ['data' => $this->homeData]);
    }

    /**
     * Updating banner page
     *
     * @param Request $request
     */
    public function banner_update(Request $request)
    {
        $this->homeData->hi = $request->hi;
        $this->homeData->name = $request->name;
        $this->homeData->title = $request->title;
        $this->homeData->description = $request->description;

        $this->homeData->save();

        toastr()->success('Banner Updated Successfully.');
        return redirect()->back();
    }

    /**
     * Showing welcome page to admin
     */
    public function welcome()
    {
        return view('admin.home.welcome', ['data' => $this->homeData]);
    }

    /**
     * Updating welcome page
     *
     * @param Request $request
     */
    public function welcome_update(Request $request)
    {
        $this->homeData->welcome_title = $request->welcome_title;
        $this->homeData->welcome_description = $request->welcome_description;
        $this->homeData->quality_icon = $request->quality_icon;
        $this->homeData->quality_text = $request->quality_text;
        $this->homeData->performance_icon = $request->performance_icon;
        $this->homeData->performance_text = $request->performance_text;
        $this->homeData->support_icon = $request->support_icon;
        $this->homeData->support_text = $request->support_text;

        $this->homeData->save();

        toastr()->success('Welcome Section Updated Successfully.');
        return redirect()->back();
    }

    /**
     * Showing Service page to admin
     */
    public function service()
    {
        return view('admin.home.service', ['data' => $this->homeData]);
    }

    /**
     * Updating Service page
     *
     * @param Request $request
     */
    public function service_update(Request $request)
    {
        $this->homeData->service_show = (bool) $request->service_show;
        $this->homeData->service_title = $request->service_title;
        $this->homeData->service_count = (int) $request->service_count;

        $this->homeData->save();

        toastr()->success('Service Section Updated Successfully.');
        return redirect()->back();
    }


    /**
     * Showing Process page to admin
     */
    public function process()
    {
        return view('admin.home.process', ['data' => $this->homeData]);
    }

    /**
     * Updating Process page
     *
     * @param Request $request
     */
    public function process_update(Request $request)
    {
        $this->homeData->process_show = (bool) $request->process_show;
        $this->homeData->process_title = $request->process_title;

        $this->homeData->save();

        toastr()->success('Process Section Updated Successfully.');
        return redirect()->back();
    }

    /**
     * Showing Portfolio page to admin
     */
    public function portfolio()
    {
        return view('admin.home.portfolio', ['data' => $this->homeData]);
    }

    /**
     * Updating Portfolio page
     *
     * @param Request $request
     */
    public function portfolio_update(Request $request)
    {
        $this->homeData->portfolio_show = (bool) $request->portfolio_show;
        $this->homeData->portfolio_title = $request->portfolio_title;
        $this->homeData->portfolio_count = (int) $request->portfolio_count;

        $this->homeData->save();

        toastr()->success('Portfolio Section Updated Successfully.');
        return redirect()->back();
    }
}
