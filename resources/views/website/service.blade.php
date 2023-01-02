@extends('layouts.web')

@section('title')
    Service
@endsection

@section('_seo')
    <meta property="og:title" content="RonInve | Service">
    <meta property="og:description" content="This is free inventory management software">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="RonInve.Com">
    <meta property="og:image" content="{{ asset('website/images/logo/logo-2.png') }}" />
    <meta name="author" content="Rashiqul Rony">
    <meta name="description" content="This is free inventory management software">
    <meta name="keywords" content="free, inventory, management, software">
@endsection

@section('_css')

@endsection

@section('content')
    <section class="hero-area">
        <div class="breadcrumbs-wrapper blue-dark-gradient">
            <div class="shape shape-one scene"><span data-depth="2"></span></div>
            <div class="shape shape-two scene"><span data-depth="3"></span></div>
            <div class="shape shape-three scene"><span data-depth="4"></span></div>
            <div class="shape shape-four scene"><span data-depth=".1"></span></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="page-title-text text-center">
                            <h1 class="title">Services</h1>
                            <ul class="breadcrumbs-link">
                                <li><a href="{{ route('web.home') }}">Home</a></li>
                                <li class="active">Services</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="service-area pt-120 pb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center mb-55" data-aos="fade-up" data-aos-delay="20">
                        <span class="sub-title sub-title-bg">Our Services</span>
                        <h2>We Provide the services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="block-style-four white-bg-shadow mb-40 animated-hover-icon" data-aos="fade-up" data-aos-delay="30">
                        <div class="icon cl-1">
                            <i class="flaticon-analytics"></i>
                        </div>
                        <div class="text">
                            <h3 class="title"><a href="service-details.html">Digital Analysis</a></h3>
                            <p>Integer sodales dictum mattis. Nunc ullamcorper efficitur massa, quis pellentesque</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="block-style-four white-bg-shadow mb-40 animated-hover-icon" data-aos="fade-up" data-aos-delay="35">
                        <div class="icon cl-2">
                            <i class="flaticon-email"></i>
                        </div>
                        <div class="text">
                            <h3 class="title"><a href="service-details.html">Email Marketing</a></h3>
                            <p>Integer sodales dictum mattis. Nunc ullamcorper efficitur massa, quis pellentesque</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="block-style-four white-bg-shadow mb-40 animated-hover-icon" data-aos="fade-up" data-aos-delay="40">
                        <div class="icon cl-3">
                            <i class="flaticon-digital-marketing"></i>
                        </div>
                        <div class="text">
                            <h3 class="title"><a href="service-details.html">Digital Marketing</a></h3>
                            <p>Integer sodales dictum mattis. Nunc ullamcorper efficitur massa, quis pellentesque</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="block-style-four white-bg-shadow mb-40 animated-hover-icon" data-aos="fade-up" data-aos-delay="45">
                        <div class="icon cl-4">
                            <i class="flaticon-content"></i>
                        </div>
                        <div class="text">
                            <h3 class="title"><a href="service-details.html">Content Marketing</a></h3>
                            <p>Integer sodales dictum mattis. Nunc ullamcorper efficitur massa, quis pellentesque</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="block-style-four white-bg-shadow mb-40 animated-hover-icon" data-aos="fade-up" data-aos-delay="50">
                        <div class="icon cl-5">
                            <i class="flaticon-content"></i>
                        </div>
                        <div class="text">
                            <h3 class="title"><a href="service-details.html">data analytics</a></h3>
                            <p>Integer sodales dictum mattis. Nunc ullamcorper efficitur massa, quis pellentesque</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="block-style-four white-bg-shadow mb-40 animated-hover-icon" data-aos="fade-up" data-aos-delay="55">
                        <div class="icon cl-6">
                            <i class="flaticon-content"></i>
                        </div>
                        <div class="text">
                            <h3 class="title"><a href="service-details.html">data analytics</a></h3>
                            <p>Integer sodales dictum mattis. Nunc ullamcorper efficitur massa, quis pellentesque</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="fancy-text-block fancy-text-block-seven pt-120 pb-70 gray-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="img-holder mb-50">
                        <img src="{{ asset('website') }}/images/about/img-2.jpg" class="img-position img-one animate-float-y" alt="Image">
                        <img src="{{ asset('website') }}/images/about/img-3.jpg" class="img-position img-two animate-float-x" alt="Image">
                        <div class="shape shape-one scene"><span data-depth="4"><img src="{{ asset('website') }}/images/shape/object-3.png" class="shape-icon shape-one" alt="Image"></span></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-wrapper mb-50">
                        <div class="section-title mb-35" data-aos="fade-up" data-aos-delay="20">
                            <span class="sub-title sub-title-bg">Our Mission</span>
                            <h2>Innovation increases
                                productivity </h2>
                        </div>
                        <div class="block-style-eight d-flex mb-25 animated-hover-icon" data-aos="fade-up" data-aos-delay="30">
                            <div class="icon bg-one">
                                <i class="flaticon-customer-service"></i>
                            </div>
                            <div class="text">
                                <h5 class="title">Free Client Support</h5>
                                <p>Integer sodales dictum mattis. Nunc ullamcorper efficitur</p>
                            </div>
                        </div>
                        <div class="block-style-eight d-flex mb-25 animated-hover-icon" data-aos="fade-up" data-aos-delay="40">
                            <div class="icon bg-two">
                                <i class="flaticon-technology-products"></i>
                            </div>
                            <div class="text">
                                <h5 class="title">Build Your Promotes</h5>
                                <p>Integer sodales dictum mattis. Nunc ullamcorper efficitur</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('_js')

@endpush
