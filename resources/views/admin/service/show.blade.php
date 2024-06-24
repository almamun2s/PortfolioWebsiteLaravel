{{-- 
    This is a view page of service
    This page is accessable from frontend
--}}

@extends('frontend.main_layout')
@section('title', $service->title)

@section('main_content')

    <section class="service">
        <div class="container">
            <div class="row">
                <h1 class="special_under">{{ $service->title }}</h1>
                <h2 class="special_upper wow animate__animated animate__fadeInLeft">{{ $service->sub_title }}</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {!! $service->description !!}
                </div>
            </div>
        </div>
    </section>
@endsection
