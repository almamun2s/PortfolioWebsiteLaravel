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
                                <h2 class="wow animate__animated animate__fadeInUp animation_dur1-5">{{ $process->name }}</h2>
                                <p class="wow animate__animated animate__fadeInUp animation_dur1-5">{{ $process->description }}</p>
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
                        <a class="nav-link active portfolio_tab_controller" id="home-tab" data-toggle="tab" href="#home"
                            role="tab" aria-controls="home" aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link portfolio_tab_controller" id="profile-tab" data-toggle="tab" href="#profile"
                            role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link portfolio_tab_controller" id="contact-tab" data-toggle="tab" href="#contact"
                            role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


                        <div class="row wow animate__animated animate__fadeInUp animation_dur1-5">
                            <div class="col-md-3 mb-2">
                                <div class="portfolio_inner">
                                    <a href="#">
                                        <img src="./asset/img/portfolio2.jpg" alt="Portfolio">
                                        <h5 class="portfolio_title text-white">This is title of the portfolio</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 mb-2">
                                <div class="portfolio_inner">
                                    <a href="#">
                                        <img src="./asset/img/portfolio2.jpg" alt="Portfolio">
                                        <h5 class="portfolio_title text-white">This is Bigger one. Lorem ipsum dolor sit
                                            amet.</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 mb-2">
                                <div class="portfolio_inner">
                                    <a href="#">
                                        <img src="./asset/img/portfolio2.jpg" alt="Portfolio">
                                        <h5 class="portfolio_title text-white">This is Bigger one. Lorem ipsum dolor sit
                                            amet.</h5>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-3 mb-2">
                                <div class="portfolio_inner">
                                    <a href="#">
                                        <img src="./asset/img/portfolio2.jpg" alt="Portfolio">
                                        <h5 class="portfolio_title text-white">Lorem ipsum dolor sit, amet consectetur
                                            adipisicing
                                            elit. Cupiditate, nulla...</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 mb-2">
                                <div class="portfolio_inner">
                                    <a href="#">
                                        <img src="./asset/img/portfolio2.jpg" alt="Portfolio">
                                        <h5 class="portfolio_title text-white">Lorem ipsum dolor sit, amet consectetur
                                            adipisicing
                                            elit. Cupiditate, nulla...</h5>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-3 mb-2">
                                <div class="portfolio_inner">
                                    <a href="#">
                                        <img src="./asset/img/portfolio2.jpg" alt="Portfolio">
                                        <h5 class="portfolio_title text-white">This is Bigger one. Lorem ipsum dolor sit
                                            amet.</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 mb-2">
                                <div class="portfolio_inner">
                                    <a href="#">
                                        <img src="./asset/img/portfolio2.jpg" alt="Portfolio">
                                        <h5 class="portfolio_title text-white">Lorem ipsum dolor sit, amet consectetur
                                            adipisicing
                                            elit. Cupiditate, nulla...</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 mb-2">
                                <div class="portfolio_inner">
                                    <a href="#">
                                        <img src="./asset/img/portfolio2.jpg" alt="Portfolio">
                                        <h5 class="portfolio_title text-white">Lorem ipsum dolor sit, amet consectetur
                                            adipisicing
                                            elit. Cupiditate, nulla...</h5>
                                    </a>
                                </div>
                            </div>
                        </div>





                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <p>This is the Profile tab content.</p>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <p>This is the Contact tab content.</p>
                    </div>
                </div>



            </div>
        </section>
    @endif

@endsection
