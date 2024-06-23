@extends('frontend.main_layout')

@section('title', 'Abdullah Almamun')

@section('main_content')


    <!-- Banner Section -->
    <section class="banner" style="background-image: url({{ asset('uploads/frontImg/herobg.jpg') }});">
        <div class="container">
            <div class="row text-white">
                <div class="col-md-6 my-title">
                    <h2 class="wow animate__animated animate__fadeInUp anim animation_dur-5">{{ $data->hi }}</h2>
                    <h1 class="font-weight-bold wow animate__animated animate__fadeInUp animation_dur1">{{ $data->name }}</h1>
                    <h2 class="wow animate__animated animate__fadeInUp animation_dur1-5">{{ $data->title }}</h2>
                </div>
                <div class="col-md-6 my-description">
                    <p class="h4 wow animate__animated animate__fadeInUp animation_dur2">Web Design
                        and Web Development are my meditation. My goal is to make Satisfy my every
                        clients with error free and all the requirments of them. You'll get the best service and On-time
                        Delivery from me.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Welcome Section -->
    <section class="welcome">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="font-weight-bold wow animate__animated animate__fadeInUp animation_dur1-5">Welcome to my
                        website</h2>
                    <div class="h5 wow animate__animated animate__fadeInUp animation_dur1-5">
                        <p>I am passionate about making error free website which will be faster to load, more beautiful
                            to
                            visit, easier to use, accessible to all and frustration-free with fully responsive.</p>
                        <p>I am ensuring you that you will get a website from me which you can manage your content
                            easily by
                            wordpress without knowing any type of coding knowledge. And that will be unique including
                            your
                            requirements so that you can find success online faster.
                        </p>
                    </div>
                    <div class="text-center py-1 wow animate__animated animate__bounceInLeft">
                        <a href="#" class="btn btn-primary ff-ubuntu text-white reach_btn">Reach out me</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row wlc_item">
                        <div class="col-sm-2 position-relative">
                            <div class="wlc_icon wow animate__animated animate__bounceInDown">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </div>
                        </div>
                        <div class="col-sm-10 wlc_item_inn">
                            <h3 class="wow animate__animated animate__fadeInUp animation_dur1-5">Quality</h3>
                            <p class="wow animate__animated animate__fadeInUp animation_dur1-5">Friendly coding and
                                design professionally increase website speed. Only experienced person
                                can make sure this.</p>
                        </div>
                    </div>
                    <div class="row wlc_item">
                        <div class="col-sm-2">
                            <div class="wlc_icon wow animate__animated animate__bounceInRight">
                                <i class="fa-regular fa-hand-back-fist "></i>
                            </div>
                        </div>
                        <div class="col-sm-10 wlc_item_inn">
                            <h3 class="wow animate__animated animate__fadeInUp animation_dur1-5">Performance</h3>
                            <p class="wow animate__animated animate__fadeInUp animation_dur1-5">I use HTML, CSS, and
                                JavaScript to produce responsive websites that provide users the
                                best experience suited to their devices.</p>
                        </div>
                    </div>
                    <div class="row wlc_item">
                        <div class="col-sm-2">
                            <div class="wlc_icon wow animate__animated animate__bounceInUp">
                                <i class="fa-solid fa-hands-helping"></i>
                            </div>
                        </div>
                        <div class="col-sm-10 wlc_item_inn">
                            <h3 class="wow animate__animated animate__fadeInUp animation_dur1-5">Support</h3>
                            <p class="wow animate__animated animate__fadeInUp animation_dur1-5">Get lifetime working
                                relationship and support with full instructions from me. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Service Section -->
    <section class="service">
        <div class="container">
            <div class="row">
                <h1 class="special_under">Service</h1>
                <h2 class="special_upper wow animate__animated animate__fadeInLeft">Which things I do</h2>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3 service_item">
                    <a href="#">
                        <div class="service_item_left wow animate__animated animate__fadeInLeft animation_dur1-5">
                            <i class="fab fa-html5"></i>
                        </div>
                        <div class="service_item_right">
                            <h3 class="font-weight-bold wow animate__animated animate__fadeInDown animation_dur1-5">PSD
                                to HTML</h3>
                            <h5 class="wow animate__animated animate__fadeInUp animation_dur1-5">I will convert custom
                                design to HTML5</h5>
                        </div>
                        <div class="service_number">1</div>
                    </a>
                </div>
                <div class="col-md-6 mb-3 service_item">
                    <a href="#">
                        <div class="service_item_left wow animate__animated animate__fadeInLeft animation_dur1-5">
                            <i class="fab fa-html5"></i>
                        </div>
                        <div class="service_item_right">
                            <h3 class="font-weight-bold wow animate__animated animate__fadeInDown animation_dur1-5">PSD
                                to HTML</h3>
                            <h5 class="wow animate__animated animate__fadeInUp animation_dur1-5">I will convert custom
                                design to HTML5</h5>
                        </div>
                        <div class="service_number">1</div>
                    </a>
                </div>
                <div class="col-md-6 mb-3 service_item">
                    <a href="#">
                        <div class="service_item_left wow animate__animated animate__fadeInLeft animation_dur1-5">
                            <i class="fab fa-html5"></i>
                        </div>
                        <div class="service_item_right">
                            <h3 class="font-weight-bold wow animate__animated animate__fadeInDown animation_dur1-5">PSD
                                to HTML</h3>
                            <h5 class="wow animate__animated animate__fadeInUp animation_dur1-5">I will convert custom
                                design to HTML5</h5>
                        </div>
                        <div class="service_number">1</div>
                    </a>
                </div>
                <div class="col-md-6 mb-3 service_item">
                    <a href="#">
                        <div class="service_item_left wow animate__animated animate__fadeInLeft animation_dur1-5">
                            <i class="fab fa-html5"></i>
                        </div>
                        <div class="service_item_right">
                            <h3 class="font-weight-bold wow animate__animated animate__fadeInDown animation_dur1-5">PSD
                                to HTML</h3>
                            <h5 class="wow animate__animated animate__fadeInUp animation_dur1-5">I will convert custom
                                design to HTML5</h5>
                        </div>
                        <div class="service_number">1</div>
                    </a>
                </div>
                <div class="col-md-6 mb-3 service_item">
                    <a href="#">
                        <div class="service_item_left wow animate__animated animate__fadeInLeft animation_dur1-5">
                            <i class="fab fa-html5"></i>
                        </div>
                        <div class="service_item_right">
                            <h3 class="font-weight-bold wow animate__animated animate__fadeInDown animation_dur1-5">PSD
                                to HTML</h3>
                            <h5 class="wow animate__animated animate__fadeInUp animation_dur1-5">I will convert custom
                                design to HTML5</h5>
                        </div>
                        <div class="service_number">1</div>
                    </a>
                </div>


            </div>
        </div>
    </section>


    <!-- Process Section -->
    <section class="process">
        <div class="container">
            <div class="row">
                <h1 class="special_under">Process</h1>
                <h2 class="special_upper wow animate__animated animate__fadeInRight">Find out how I work</h2>
            </div>
            <div class="row">
                <div class="col-md-4 process_item">
                    <div class="process_item_inner">
                        <div class="process_icon wow animate__animated animate__fadeInTopLeft animation_dur1">
                            <i class="fa-regular fa-comment"></i>
                        </div>
                        <h2 class="wow animate__animated animate__fadeInUp animation_dur1-5">Conversation</h2>
                        <p class="wow animate__animated animate__fadeInUp animation_dur1-5">
                            First, I make a conversation with my clients. It is very important for me. Because, it is
                            nedded
                            to understand the project requirements of them. Sometimes, I make audio or video call to
                            communicate with clients faster
                        </p>
                    </div>
                </div>



                <div class="col-md-4 process_item">
                    <div class="process_item_inner">
                        <div class="process_icon wow animate__animated animate__fadeInDown animation_dur1">
                            <i class="fa-regular fa-comment"></i>
                        </div>
                        <h2 class="wow animate__animated animate__fadeInUp animation_dur1-5">Conversation</h2>
                        <p class="wow animate__animated animate__fadeInUp animation_dur1-5">
                            First, I make a conversation with my clients. It is very important for me. Because, it is
                            nedded
                            to understand the project requirements of them. Sometimes, I make audio or video call to
                            communicate with clients faster
                        </p>
                    </div>
                </div>


                <div class="col-md-4 process_item">
                    <div class="process_item_inner">
                        <div class="process_icon wow animate__animated animate__fadeInTopRight animation_dur1">
                            <i class="fa-regular fa-comment"></i>
                        </div>
                        <h2 class="wow animate__animated animate__fadeInUp animation_dur1-5">Conversation</h2>
                        <p class="wow animate__animated animate__fadeInUp animation_dur1-5">
                            First, I make a conversation with my clients. It is very important for me. Because, it is
                            nedded
                            to understand the project requirements of them. Sometimes, I make audio or video call to
                            communicate with clients faster
                        </p>
                    </div>
                </div>


                <div class="col-md-4 process_item">
                    <div class="process_item_inner">
                        <div class="process_icon wow animate__animated animate__fadeInBottomLeft animation_dur1">
                            <i class="fa-regular fa-comment"></i>
                        </div>
                        <h2 class="wow animate__animated animate__fadeInUp animation_dur1-5">Conversation</h2>
                        <p class="wow animate__animated animate__fadeInUp animation_dur1-5">
                            First, I make a conversation with my clients. It is very important for me. Because, it is
                            nedded
                            to understand the project requirements of them. Sometimes, I make audio or video call to
                            communicate with clients faster
                        </p>
                    </div>
                </div>


                <div class="col-md-4 process_item">
                    <div class="process_item_inner">
                        <div class="process_icon wow animate__animated animate__fadeInUp animation_dur1">
                            <i class="fa-regular fa-comment"></i>
                        </div>
                        <h2 class="wow animate__animated animate__fadeInUp animation_dur1-5">Conversation</h2>
                        <p class="wow animate__animated animate__fadeInUp animation_dur1-5">
                            First, I make a conversation with my clients. It is very important for me. Because, it is
                            nedded
                            to understand the project requirements of them. Sometimes, I make audio or video call to
                            communicate with clients faster
                        </p>
                    </div>
                </div>


                <div class="col-md-4 process_item">
                    <div class="process_item_inner">
                        <div class="process_icon wow animate__animated animate__fadeInBottomRight animation_dur1">
                            <i class="fa-regular fa-comment"></i>
                        </div>
                        <h2 class="wow animate__animated animate__fadeInUp animation_dur1-5">Conversation</h2>
                        <p class="wow animate__animated animate__fadeInUp animation_dur1-5">
                            First, I make a conversation with my clients. It is very important for me. Because, it is
                            nedded
                            to understand the project requirements of them. Sometimes, I make audio or video call to
                            communicate with clients faster
                        </p>
                    </div>
                </div>



            </div>
        </div>
    </section>


    <!-- Portfolio Section -->
    <section class="portfolio">
        <div class="container">
            <div class="row">
                <h1 class="special_under">Portfolio</h1>
                <h2 class="special_upper wow animate__animated animate__fadeInLeft">Visit my previous works</h2>
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

@endsection
