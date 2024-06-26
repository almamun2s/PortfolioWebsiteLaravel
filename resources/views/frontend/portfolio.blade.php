@extends('frontend.main_layout')

@section('title', $pageTitle)

@section('main_content')
    <!-- Portfolio Section -->
    <section class="portfolio">
        <div class="container">
            <div class="row">
                <h1 class="special_under">{{ $pageTitle }}</h1>
                <h2 class="special_upper wow animate__animated animate__fadeInDown">{{ $portfolioTitle }}</h2>
            </div>
            <div class="row wow animate__animated animate__fadeInUp">

                @foreach ($portfolios as $portfolio)
                    @if ($portfolio->is_public)
                        <div class="col-md-3 mb-2">
                            <div class="portfolio_inner">
                                <a href="{{ route('single_portfolio', $portfolio->slug) }}">
                                    <img src="{{ $portfolio->getImg() }}" alt="{{ $portfolio->title }}">
                                    <h5 class="portfolio_title text-white">{{ $portfolio->title }}</h5>
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            {{ $portfolios->links('vendor.pagination.bootstrap-4') }}

        </div>
    </section>
@endsection
