<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('uploads/frontImg/favicon.png') }}" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('packages/bootstrap4/bootstrap4.min.css') }}">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('packages/fontawesome/css/all.min.css') }}">
    <!-- WOW CSS -->
    <link rel="stylesheet" href="{{ asset('packages/wow/wow.css') }}">
    <!-- PopUp CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/popup.css') }}">
    <!-- About CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/about.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!-- jQuery JS -->
    <script src="{{ asset('packages/jquery/jquery.js') }}"></script>
    <style>
        .active a {
            color: var(--logo_up) !important;
        }
    </style>
</head>

<body>

    <!-- Header Navbar -->
    <header>
        <div class="container">
            <div class="row position-relative">
                <div class="col-md-2">
                    <div class="logo">
                        <a href="{{ route('home') }}" target="_blank">
                            <img src="{{ asset('uploads/frontImg/logo.png') }}" alt="Abdullah Almamun">
                        </a>
                    </div>
                </div>
                <div class="col-md-10">
                    <!-- Header Menu -->
                    <div class="main_menu">
                        <ul class="mb-0 justify-content-end">
                            <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                                <a href="{{ route('home') }}" style="">Home</a>
                            </li>
                            <li class="{{ request()->routeIs('portfolio') ? 'active' : '' }}">
                                <a href="{{ route('portfolio') }}">Portfolio</a>
                            </li>
                            <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                                <a href="{{ route('about') }}">About</a>
                            </li>
                            <li>
                                <span class="btn btn-primary fw-bolder ff-ubuntu text-white reach_btn">Reach out
                                    me</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="menu_btn">
                    <i class="fas fa-bars" id="show_menu"></i>
                    <i class="fas fa-xmark hide" id="hide_menu"></i>
                </div>
            </div>
        </div>

    </header>


    @yield('main_content')


    <!-- Footer Section -->
    <section class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="text-white font-weight-bold wow animate__animated animate__fadeInLeft">Let's Discuss</h2>
                    <p class="text-white wow animate__animated animate__fadeInUp animation_dur1-5">If you have a project
                        or just question, click on the button and feel free by
                        filling up the form
                        and I will reply as soon as I can. </p>
                </div>
                <div
                    class="col-md-4 d-flex justify-content-center align-items-center wow animate__animated animate__fadeInRight">
                    <button id="contact_btn"> Reach
                        out me </button>
                </div>
            </div>
        </div>
    </section>
    <style>
        .hideIt {
            display: none;
        }
    </style>
    <div class="popup_contact" id="popup_contact">
        <div class="popup_inner" id="popup_inner">
            <div class="xmark" id="xmark">
                <i class="fas fa-xmark"></i>
            </div>
            <h2>Contact Form</h2>
            <form action="" class="contact_form" id="contact_form">
                @csrf
                <div class="input mb-3">
                    <input type="text" name="name" id="name" autocomplete="off" required="">
                    <label for="name"><span>Name</span></label>
                </div>
                <div class="input mb-3">
                    <input type="text" name="email" id="email" autocomplete="off" required="">
                    <label for="email"><span>Email</span></label>
                </div>
                <div class="textarea">
                    <textarea name="message" id="message" cols="30" rows="3" required=""></textarea>
                    <label for="message"><span>Message</span></label>
                </div>
                <div class="input mt-3" id="submitBtn">
                    <input type="submit" value="Send" id="formSubmitBtn">
                </div>
                <div class="h3 hideIt" id="sendingSms">
                    <p>Sending...</p>
                </div>
                <div class="h4 hideIt" id="thanksSms">
                    <p>Thank you for contacting me.</p>
                </div>
            </form>

        </div>
    </div>


    <!-- Footer -->
    <footer class="py-4" style="background-color: #000;">
        <h4 class="text-center text-white">All &copy; right reserved by Abdullah Almamun</h4>
    </footer>





    <!-- Bootstrap JS -->
    <script src="{{ asset('packages/bootstrap4/bootstrap.min.js') }}"></script>
    <!-- Proper JS -->
    <script src="{{ asset('packages/bootstrap4/popper.js') }}"></script>
    <!-- Proper JS -->
    <script src="{{ asset('packages/wow/wow.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('frontend/js/script.js') }}"></script>
    <script>
        $(document).ready(function() {
            let contactForm = $('#contact_form')[0];
            let formBtn = $('#formSubmitBtn');
            let submitBtn = $('#submitBtn');
            let sending = $('#sendingSms');
            let thanks = $('#thanksSms');
            formBtn.click(function(event) {
                event.preventDefault();

                submitBtn.addClass('hideIt');
                sending.removeClass('hideIt');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                $.ajax({
                    type: 'POST',
                    url: '{{ route('contact') }}',
                    data: {
                        name: $('#name').val(),
                        email: $('#email').val(),
                        message: $('#message').val(),
                    },
                    success: function(data) {
                        setTimeout(function() {
                            sending.addClass('hideIt');
                            thanks.removeClass('hideIt');
                            contactForm.reset();
                        }, 500);

                        setTimeout(function() {
                            thanks.addClass('hideIt');
                            submitBtn.removeClass('hideIt');
                        }, 3000);
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            });
        });
    </script>
</body>

</html>
