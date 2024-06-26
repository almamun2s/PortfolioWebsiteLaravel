@extends('frontend.main_layout')

@section('title', 'Abdullah Almamun')

@section('main_content')


    <!-- Banner Section -->
    <section class="banner" style="background-image: url({{ asset('uploads/frontImg/herobg.jpg') }});">
        <div class="container">
            <div class="row text-white">
                <div class="col-md-6 my-title">
                    <h2 class="wow animate__animated animate__fadeInUp anim animation_dur-5">{{ $data->hi }}</h2>
                    <h1 class="font-weight-bold wow animate__animated animate__fadeInUp animation_dur1">{{ $data->name }}
                    </h1>
                    <h2 class="wow animate__animated animate__fadeInUp animation_dur1-5">{{ $data->title }}</h2>
                </div>
                <div class="col-md-6 my-description">
                    <p class="h4 wow animate__animated animate__fadeInUp animation_dur2">{{ $data->description }}</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Welcome Section -->
    <section class="welcome">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="font-weight-bold wow animate__animated animate__fadeInUp animation_dur1-5">
                        {{ $data->welcome_title }}</h2>
                    <div class="h5 wow animate__animated animate__fadeInUp animation_dur1-5">
                        <p>{{ $data->welcome_description }}</p>
                    </div>
                    <div class="text-center py-1 wow animate__animated animate__bounceInLeft">
                        <a href="#" class="btn btn-primary ff-ubuntu text-white reach_btn">Reach out me</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row wlc_item">
                        <div class="col-sm-2 position-relative">
                            <div class="wlc_icon wow animate__animated animate__bounceInDown">
                                <i class="{{ $data->quality_icon }}"></i>
                            </div>
                        </div>
                        <div class="col-sm-10 wlc_item_inn">
                            <h3 class="wow animate__animated animate__fadeInUp animation_dur1-5">Quality</h3>
                            <p class="wow animate__animated animate__fadeInUp animation_dur1-5">{{ $data->quality_text }}
                            </p>
                        </div>
                    </div>
                    <div class="row wlc_item">
                        <div class="col-sm-2">
                            <div class="wlc_icon wow animate__animated animate__bounceInRight">
                                <i class="{{ $data->performance_icon }}"></i>
                            </div>
                        </div>
                        <div class="col-sm-10 wlc_item_inn">
                            <h3 class="wow animate__animated animate__fadeInUp animation_dur1-5">Performance</h3>
                            <p class="wow animate__animated animate__fadeInUp animation_dur1-5">
                                {{ $data->performance_text }}</p>
                        </div>
                    </div>
                    <div class="row wlc_item">
                        <div class="col-sm-2">
                            <div class="wlc_icon wow animate__animated animate__bounceInUp">
                                <i class="{{ $data->support_icon }}"></i>
                            </div>
                        </div>
                        <div class="col-sm-10 wlc_item_inn">
                            <h3 class="wow animate__animated animate__fadeInUp animation_dur1-5">Support</h3>
                            <p class="wow animate__animated animate__fadeInUp animation_dur1-5">{{ $data->support_text }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @if ($data->service_show)
        <!-- Service Section -->
        <section class="service">
            <div class="container">
                <div class="row">
                    <h1 class="special_under">Service</h1>
                    <h2 class="special_upper wow animate__animated animate__fadeInLeft">{{ $data->service_title }}</h2>
                </div>
                <div class="row">
                    @php
                        $services = App\Models\Service::where('is_public', 1)
                            ->latest()
                            ->limit($data->service_count)
                            ->get();
                    @endphp
                    @foreach ($services as $key => $service)
                        <div class="col-md-6 mb-3 service_item">
                            <a href="{{ route('service', $service->id) }}">
                                <div class="service_item_left wow animate__animated animate__fadeInLeft animation_dur1-5">
                                    <i class="{{ $service->icon }}"></i>
                                </div>
                                <div class="service_item_right">
                                    <h3 class="font-weight-bold wow animate__animated animate__fadeInDown animation_dur1-5">
                                        {{ $service->title }}</h3>
                                    <h5 class="wow animate__animated animate__fadeInUp animation_dur1-5">
                                        {{ $service->sub_title }}</h5>
                                </div>
                                <div class="service_number">{{ $key + 1 }}</div>
                            </a>
                        </div>
                    @endforeach






                </div>
            </div>
        </section>
    @endif

    @if ($data->process_show)
        <!-- Process Section -->
        <section class="process">
            <div class="container">
                <div class="row">
                    <h1 class="special_under">Process</h1>
                    <h2 class="special_upper wow animate__animated animate__fadeInRight">{{ $data->process_title }}</h2>
                </div>
                <div class="row">
                    @php
                        $processes = App\Models\Process::orderBy('serial', 'ASC')->get();
                    @endphp
                    @foreach ($processes as $process)
                        <div class="col-md-4 process_item">
                            <div class="process_item_inner">
                                <div class="process_icon wow animate__animated animate__fadeInTopLeft animation_dur1">
                                    <i class="{{ $process->icon }}"></i>
                                </div>
                                <h2 class="wow animate__animated animate__fadeInUp animation_dur1-5">{{ $process->name }}
                                </h2>
                                <p class="wow animate__animated animate__fadeInUp animation_dur1-5">
                                    {{ $process->description }}</p>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </section>
    @endif

    @if ($data->portfolio_show)
        <!-- Portfolio Section -->
        <section class="portfolio">
            <div class="container">
                <div class="row">
                    <h1 class="special_under">Portfolio</h1>
                    <h2 class="special_upper wow animate__animated animate__fadeInLeft">{{ $data->portfolio_title }}</h2>
                </div>
                <!-- Navigation Menu -->
                <ul class="nav nav-tabs mb-3 bb-0" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active portfolio_tab_controller" id="all-tab" data-toggle="tab" href="#all"
                            role="tab" aria-controls="all" aria-selected="true">All</a>
                    </li>

                    @php
                        $categories = App\Models\Category::where('is_public', 1)->latest()->get();
                    @endphp
                    @foreach ($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link portfolio_tab_controller" id="{{ $category->name }}-tab" data-toggle="tab"
                                href="#{{ $category->name }}" role="tab" aria-controls="{{ $category->name }}"
                                aria-selected="false">{{ $category->name }}</a>
                        </li>
                    @endforeach

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                        <div class="row wow animate__animated animate__fadeInUp animation_dur1-5">
                            @php
                                $portfolios = App\Models\Portfolio::where('is_public', 1)
                                    ->latest()
                                    ->limit($data->portfolio_count)
                                    ->get();
                            @endphp
                            @foreach ($portfolios as $portfolio)
                                <div class="col-md-3 mb-2">
                                    <div class="portfolio_inner">
                                        <a href="#">
                                            <img src="{{ $portfolio->getImg() }}" alt="{{ $portfolio->title }}">
                                            <h5 class="portfolio_title text-white">{{ $portfolio->title }}</h5>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    @foreach ($categories as $category)
                        <div class="tab-pane fade" id="{{ $category->name }}" role="tabpanel"
                            aria-labelledby="{{ $category->name }}-tab">
                            <div class="row wow animate__animated animate__fadeInUp animation_dur1-5">
                                @foreach ($category->portfolios as $key => $portfolio)
                                    @if ($key < $data->portfolio_count && $portfolio->is_public == true)
                                        <div class="col-md-3 mb-2">
                                            <div class="portfolio_inner">
                                                <a href="#">
                                                    <img src="{{ $portfolio->getImg() }}" alt="{{ $portfolio->title }}">
                                                    <h5 class="portfolio_title text-white">{{ $portfolio->title }}</h5>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                </div>



            </div>
        </section>
    @endif

@endsection
