@extends('client.layout.master')
@section('content-title','Trang chủ')
@section('content')
<!-- Carousel Start -->
<div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="{{ asset('assets/client/img/carousel-1.jpg') }}" alt="Image">
            </div>
            <div class="carousel-item">
                <img class="w-100" src="{{ asset('assets/client/img/carousel-2.jpg') }}" alt="Image">
            </div>
            <div class="carousel-item">
                <img class="w-100" src="{{ asset('assets/client/img/carousel-3.jpg') }}" alt="Image">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->



<!-- Feature Start -->
<div class="container-fluid p-0 wow fadeIn">
    <div data-aos="flip-left"
    data-aos-easing="ease-out-cubic"
    data-aos-duration="2000">
        <img class="w-100" src="{{ asset('assets/client/img/carousel-4.jpg') }}" alt="Image">
    </div>
    <div data-aos="flip-right"
    data-aos-easing="ease-out-cubic"
    data-aos-duration="2000">
        <img class="w-100" src="{{ asset('assets/client/img/carousel-5.jpg') }}" alt="Image">
    </div>
    <div data-aos="zoom-in-down"
    data-aos-easing="linear"
    data-aos-duration="2000">
        <img class="w-100" src="{{ asset('assets/client/img/carousel-6.jpg') }}" alt="Image">
    </div>
</div>
@endsection