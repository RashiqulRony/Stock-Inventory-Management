@extends('layouts.web')

@section('title')
    Pricing
@endsection

@section('_seo')
    <meta property="og:title" content="RonInve | Pricing">
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
                            <h1 class="title">Pricing</h1>
                            <ul class="breadcrumbs-link">
                                <li><a href="{{ route('web.home') }}">Home</a></li>
                                <li class="active">Pricing</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pricing-area pricing-style-one pt-120 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="section-title text-center mb-55">
                        <span class="sub-title sub-title-bg">Pricing Table</span>
                        <h2>Provide Awesome
                            pricing plan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="pricing-item pricing-item-one block-icon-animate mb-40" data-aos="fade-up" data-aos-delay="20">
                        <div class="pricing-header d-flex">
                            <div class="icon">
                                <i class="flaticon-shuttle"></i>
                            </div>
                            <div class="title">
                                <span class="plan">Basic Plan</span>
                                <h2 class="price"><span class="sign">$</span>29 <span class="duration">/Mo</span></h2>
                            </div>
                        </div>
                        <div class="pricing-body">
                            <ul class="check-list-one">
                                <li class="check">Limited Acess Library</li>
                                <li class="check">Limited Acess Library</li>
                                <li class="uncheck">Private cloud hosting</li>
                                <li class="uncheck">Full security</li>
                                <li class="uncheck">Hotline Support 24/7</li>
                            </ul>
                            <a href="pricing.html" class="main-btn bordered-btn bordered-blue">Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="pricing-item pricing-item-one block-icon-animate mb-40" data-aos="fade-up" data-aos-delay="30">
                        <div class="pricing-header d-flex">
                            <div class="icon">
                                <i class="flaticon-medal"></i>
                            </div>
                            <div class="title">
                                <span class="plan">Standard Plan</span>
                                <h2 class="price"><span class="sign">$</span>69 <span class="duration">/Mo</span></h2>
                            </div>
                        </div>
                        <div class="pricing-body">
                            <ul class="check-list-one">
                                <li class="check">Limited Acess Library</li>
                                <li class="check">Limited Acess Library</li>
                                <li class="uncheck">Private cloud hosting</li>
                                <li class="uncheck">Full security</li>
                                <li class="uncheck">Hotline Support 24/7</li>
                            </ul>
                            <a href="pricing.html" class="main-btn bordered-btn bordered-blue">Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="pricing-item pricing-item-one block-icon-animate mb-40" data-aos="fade-up" data-aos-delay="40">
                        <div class="pricing-header d-flex">
                            <div class="icon">
                                <i class="flaticon-crown"></i>
                            </div>
                            <div class="title">
                                <span class="plan">Premium Plan</span>
                                <h2 class="price"><span class="sign">$</span>129 <span class="duration">/Mo</span></h2>
                            </div>
                        </div>
                        <div class="pricing-body">
                            <ul class="check-list-one">
                                <li class="check">Limited Acess Library</li>
                                <li class="check">Limited Acess Library</li>
                                <li class="uncheck">Private cloud hosting</li>
                                <li class="uncheck">Full security</li>
                                <li class="uncheck">Hotline Support 24/7</li>
                            </ul>
                            <a href="pricing.html" class="main-btn bordered-btn bordered-blue">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pricing-area pt-120 pb-65 gray-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="section-title text-center mb-30" data-aos="fade-up" data-aos-delay="20">
                        <span class="sub-title sub-title-bg">Pricing Table</span>
                        <h2>Provide Awesome
                            pricing plan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="switch-toggle-btn text-center mb-60" data-aos="fade-up" data-aos-delay="25">
                        <span>Monthly</span>
                        <label class="switch-box">
                            <input type="checkbox" id="checkActive"/>
                            <span class="switch-slide round"></span>
                        </label>
                        <span >Annually</span>
                    </div>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="pricing-item pricing-item-two mb-40 text-center" data-aos="fade-up" data-aos-delay="30">
                        <div class="pricing-header">
                            <div class="title">
                                <span class="plan">Basic Plan</span>
                                <h2 class="price price-one">
                                    <span class="sign">$</span>124 <span class="duration">/Mo</span>
                                </h2>
                                <h2 class="price price-two">
                                    <span class="sign">$</span>224 <span class="duration">/Ya</span>
                                </h2>
                            </div>
                            <div class="img-holder">
                                <img src="{{ asset('website') }}/images/pricing/img-1.png" alt="">
                            </div>
                        </div>
                        <div class="pricing-body">
                            <ul class="check-list-two">
                                <li class="check">Limited Acess Library</li>
                                <li class="check">Commercia License</li>
                                <li class="uncheck">Private cloud hosting</li>
                                <li class="uncheck">Full security</li>
                                <li class="uncheck">Hotline Support 24/7</li>
                            </ul>
                            <a href="pricing.html" class="main-btn btn-gradient-yellow">Buying Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="pricing-item pricing-item-two popular-pricing mb-40 text-center" data-aos="fade-up" data-aos-delay="40">
                        <div class="pricing-header">
                            <div class="title">
                                <span class="plan">Standard Plan</span>
                                <h2 class="price price-one">
                                    <span class="sign">$</span>148 <span class="duration">/Mo</span>
                                </h2>
                                <h2 class="price price-two">
                                    <span class="sign">$</span>248 <span class="duration">/Ya</span>
                                </h2>
                            </div>
                            <div class="img-holder">
                                <img src="{{ asset('website') }}/images/pricing/img-2.png" alt="">
                            </div>
                        </div>
                        <div class="pricing-body">
                            <ul class="check-list-two">
                                <li class="check">Limited Acess Library</li>
                                <li class="check">Commercia License</li>
                                <li class="uncheck">Private cloud hosting</li>
                                <li class="uncheck">Full security</li>
                                <li class="uncheck">Hotline Support 24/7</li>
                            </ul>
                            <a href="pricing.html" class="main-btn btn-white">Buying Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="pricing-item pricing-item-two mb-40 text-center" data-aos="fade-up" data-aos-delay="50">
                        <div class="pricing-header">
                            <div class="title">
                                <span class="plan">Premium Plan</span>
                                <h2 class="price price-one">
                                    <span class="sign">$</span>184 <span class="duration">/Mo</span>
                                </h2>
                                <h2 class="price price-two">
                                    <span class="sign">$</span>284 <span class="duration">/Ya</span>
                                </h2>
                            </div>
                            <div class="img-holder">
                                <img src="{{ asset('website') }}/images/pricing/img-3.png" alt="">
                            </div>
                        </div>
                        <div class="pricing-body">
                            <ul class="check-list-two">
                                <li class="check">Limited Acess Library</li>
                                <li class="check">Commercia License</li>
                                <li class="uncheck">Private cloud hosting</li>
                                <li class="uncheck">Full security</li>
                                <li class="uncheck">Hotline Support 24/7</li>
                            </ul>
                            <a href="pricing.html" class="main-btn btn-gradient-yellow">Buying Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('_js')

@endpush
