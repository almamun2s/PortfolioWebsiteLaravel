@extends('frontend.main_layout')

@section('title', $portfolio->title)

@section('main_content')
    <!-- Portfolio Section -->
    <section class="portfolio">
        <div class="container">
            <div class="row">
                <h1 class="special_under">Portfolio</h1>
                <h2 class="special_upper wow animate__animated animate__fadeInDown">{{ $portfolio->title }}</h2>
            </div>
            <div class="row wow animate__animated animate__fadeInUp">
                <div class="col-md-8">
                    <img src="{{ $portfolio->getImg() }}" alt="">
                </div>
                <div class="col-md-4">
                    <h2>Category</h2>
                    @foreach ($portfolio->categories as $category)
                        <a class="btn btn-primary rounded-pill"
                            href="{{ route('portfolio_category', $category->slug) }}">{{ $category->name }}</a>
                    @endforeach
                    <h2 class="mt-4">Tags</h2>
                    @php
                        $tags = explode(',', $portfolio->tags);
                    @endphp
                    @foreach ($tags as $tag)
                        <span class="btn btn-primary rounded-pill disabled"
                            style="background-color: #0B43CE;">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>
            <div class="row wow animate__animated animate__fadeInUp mt-5">
                <div class="col-md-12">
                    {!! $portfolio->details !!}
                </div>
            </div>


        </div>
    </section>
@endsection
