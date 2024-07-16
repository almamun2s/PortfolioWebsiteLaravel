@extends('frontend.main_layout')

@section('title', '401 page')

@section('main_content')
    <!-- Portfolio Section -->
    <section class="portfolio">
        <div class="container">
            <div class="row">
                <h1 class="special_under">401 error</h1>
                <h2 class="special_upper wow animate__animated animate__fadeIn">Unauthorized</h2>
            </div>
            <div class="row wow animate__animated animate__fadeInUp">
                <div class="col-md-12 text-center font-large" style="font-size: 1.5rem;">
                    <p>You are not permitted to access this page.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
