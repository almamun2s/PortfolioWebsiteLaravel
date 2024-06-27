@extends('frontend.main_layout')

@section('title', 'About Page')

@section('main_content')
    <!-- About Section -->
    <section class="about section about-section gray-bg" id="about">
        <div class="container">
            <div class="row align-items-center pb-4">
                <div class="col-lg-6">
                    <div class="about-avatar animate__animated animate__fadeInLeft animation_dur1-5">
                        <img src="{{ $data->getImg() }}" title="{{ $data->name }}" alt="{{ $data->name }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-text go-to">
                        <h3 class="wow animate__animated animate__fadeInUp animation_dur1-5">About Me</h3>
                        <h6 class="lead wow animate__animated animate__fadeInUp animation_dur1-5">{{ $data->title }}</h6>
                        <p class="animate__animated animate__fadeInUp animation_dur1-5">{{ $data->about_details }}</p>
                    </div>
                </div>

            </div>



            <div
                class="row d-flex justify-content-center align-items-center animate__animated animate__fadeInUp animation_dur1-5">

                @foreach ($socials as $social)
                    <div class="connect_item p-3">
                        <a href="{{ $social->links }}" target="_blank">
                            <i class="{{ $social->icon }}"></i>
                        </a>
                    </div>
                @endforeach

            </div>

            <div class="row">
                <div class="col-sm-12 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h6 class="d-flex align-items-center mb-3">Work Status</h6>
                            <p class="mb-0">Laravel</p>
                            <div class="progress mb-3 wow animate__animated" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                            <p class="mb-0">WordPress Theme Development</p>
                            <div class="progress mb-3 wow animate__animated" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="85" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                            <p class="mb-0">WordPress Plugin Development</p>
                            <div class="progress mb-3 wow animate__animated" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                            <p class="mb-0">Elementor Element Development</p>
                            <div class="progress mb-3 wow animate__animated" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="95" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center my-4">
                    <span class="btn btn-primary" id="viewAll">View All</span>
                </div>
            </div>

            <div class="row" style="display: none;" id="details">
                <div class="col-sm-6 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h6 class="d-flex align-items-center mb-3">Basic Status</h6>
                            <p class="mb-0">HTML</p>
                            <div class="progress mb-3 wow animate__animated" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="95" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                            <p class="mb-0">CSS</p>
                            <div class="progress mb-3 wow animate__animated" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                            <p class="mb-0">Bootstrap</p>
                            <div class="progress mb-3 wow animate__animated" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                            <p class="mb-0">TailWind</p>
                            <div class="progress mb-3 wow animate__animated" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="70" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                            <p class="mb-0">WordPress Customization</p>
                            <div class="progress mb-3 wow animate__animated" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="80"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mb-0">PSD to HTML</p>
                            <div class="progress mb-3 wow animate__animated" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="85"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <div class="card h-100">
                        <div class="card-body ">
                            <h6 class="d-flex align-items-center mb-3">Programming Status</h6>
                            <p class="mb-0">JavaScript</p>
                            <div class="progress mb-3 wow animate__animated" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="70"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mb-0">jQuery</p>
                            <div class="progress mb-3 wow animate__animated" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="75"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mb-0">Ajax</p>
                            <div class="progress mb-3 wow animate__animated" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="80"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mb-0">PHP</p>
                            <div class="progress mb-3 wow animate__animated" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="90"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mb-0">MySQL</p>
                            <div class="progress mb-3 wow animate__animated" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="90"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mb-0">C Programming</p>
                            <div class="progress mb-3 wow animate__animated" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="70"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mb-0">Python</p>
                            <div class="progress mb-3 wow animate__animated" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="60"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>

    </section>

    <script>
        $('#viewAll').click(function() {
            $(this).addClass('hide position-absolute');
            $('#details').slideDown(500);
        });
    </script>
@endsection
