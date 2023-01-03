@extends('layouts.web')

@section('title')
    Home
@endsection

@section('_seo')
    <meta property="og:title" content="RonInve | Home">
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
    <section class="hero-area hero-style-one bg_cover" style="background-image:url({{ asset('website/images/hero/hero-bg-1.png') }})">
        <div class="hero-shape shape-one scene"><span data-depth="1"></span></div>
        <div class="hero-shape shape-two scene"><span data-depth="2"></span></div>
        <div class="hero-shape shape-three scene"><span data-depth=".5"></span></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="hero-content text-center">
                        <h1 data-aos="fade-up">In the world of SaaS business</h1>
                        <a href="{{ route('web.about') }}" class="main-btn btn-white" data-aos="fade-up">Read More</a>
                    </div>
                </div>
            </div>
            <div class="hero-img animate-float-y">
                <img src="{{ asset('website') }}/images/hero/hero-img-1.png" alt="Hero Image">
            </div>
        </div>
    </section>

    <section class="features-area pb-30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center mb-55" data-aos="fade-up">
                        <span class="sub-title sub-title-bg">What We Do</span>
                        <h2>The complete software
                            solution</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="block-style-one block-icon-animate animated-hover-icon mb-40" data-aos="fade-up" data-aos-delay="30">
                        <div class="icon">
                            <i class="flaticon-shuttle"></i>
                        </div>
                        <div class="text">
                            <h3 class="title">Fast Development</h3>
                            <p>Aenean vel gravida erat. Donec interdum congue neque, at aliquam urna finibus </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="block-style-one block-icon-animate animated-hover-icon mb-40" data-aos="fade-up" data-aos-delay="60">
                        <div class="icon">
                            <i class="flaticon-line-graph"></i>
                        </div>
                        <div class="text">
                            <h3 class="title">Website Optimization</h3>
                            <p>Aenean vel gravida erat. Donec interdum congue neque, at aliquam urna finibus </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="block-style-one block-icon-animate animated-hover-icon mb-40" data-aos="fade-up" data-aos-delay="90">
                        <div class="icon">
                            <i class="flaticon-responsive"></i>
                        </div>
                        <div class="text">
                            <h3 class="title">Responsive design</h3>
                            <p>Aenean vel gravida erat. Donec interdum congue neque, at aliquam urna finibus </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="fancy-text-block fancy-text-block-one pb-45">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="text-wrapper mb-25" data-aos="fade-up">
                        <div class="section-title mb-20">
                            <span class="sub-title sub-title-bg">Data Analysis</span>
                            <h2>Advanced protection
                                made easy</h2>
                        </div>
                        <p>Pellentesque efficitur nibh a consectetur sodales. Curabitur quis tempor neque, non tempor nibh. Nunc sapien neque,</p>
                        <a href="about.html" class="main-btn bordered-btn bordered-blue">Read More</a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="img-holder mb-25">
                        <div class="shape shape-one scene">
                            <span data-depth="3"><img src="{{ asset('website') }}/images/shape/object-1.png" alt="object"></span>
                        </div>
                        <img src="{{ asset('website') }}/images/block/ss1.png" class="img-one animate-float-y" alt="">
                        <img src="{{ asset('website') }}/images/block/img-2.jpg" class="img-two animate-float-x" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="fancy-text-block fancy-text-block-two pb-55">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="img-holder mb-50">
                        <div class="shape shape-one scene">
                            <span data-depth="4"><img src="{{ asset('website') }}/images/shape/object-1.png" alt="object"></span>
                        </div>
                        <img src="{{ asset('website') }}/images/block/ss1.png" class="img-one animate-float-y" alt="">
                        <img src="{{ asset('website') }}/images/block/img-2.jpg" class="img-two animate-float-X" alt="">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="text-wrapper mb-50" data-aos="fade-up">
                        <div class="section-title mb-20">
                            <span class="sub-title sub-title-bg">Data Analysis</span>
                            <h2>The complete software
                                solution</h2>
                        </div>
                        <p>Nam placerat sed quam at blandit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                        <ul class="check-list-one mb-40">
                            <li class="bg-one">Responsive layout</li>
                            <li class="bg-two">Easy to customizations & update</li>
                        </ul>
                        <a href="{{ route('web.about') }}" class="main-btn bordered-btn bordered-blue">Load More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="counter-area counter-style-one blue-dark pt-100 pb-55">
        <div class="shape shape-one scene"><span data-depth="4"></span></div>
        <div class="shape shape-two scene"><span data-depth="3"></span></div>
        <div class="shape shape-three scene"><span data-depth=".5"></span></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="counter-item mb-40 animated-hover-icon text-center" data-aos="fade-up" data-aos-delay="30">
                        <div class="icon">
                            <i class="flaticon-project-management"></i>
                        </div>
                        <div class="text">
                            <h2 class="number"><span class="count">3556</span>+</h2>
                            <p>Project complate</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="counter-item mb-40 animated-hover-icon text-center" data-aos="fade-up" data-aos-delay="40">
                        <div class="icon">
                            <i class="flaticon-rating"></i>
                        </div>
                        <div class="text">
                            <h2 class="number"><span class="count">356</span>+</h2>
                            <p>Happy Customar</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="counter-item mb-40 text-center animated-hover-icon" data-aos="fade-up" data-aos-delay="50">
                        <div class="icon">
                            <i class="flaticon-medal"></i>
                        </div>
                        <div class="text">
                            <h2 class="number"><span class="count">3556</span>+</h2>
                            <p>National Award</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="counter-item mb-40 text-center animated-hover-icon" data-aos="fade-up" data-aos-delay="60">
                        <div class="icon">
                            <i class="flaticon-crown"></i>
                        </div>
                        <div class="text">
                            <h2 class="number"><span class="count">356</span>+</h2>
                            <p>Team Memeber</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="services-area pt-130 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center mb-55" data-aos="fade-up">
                        <span class="sub-title sub-title-bg">Our Services</span>
                        <h2>We offer saas for better
                            business</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="block-style-two block-icon-animate animated-hover-icon d-flex mb-30" data-aos="fade-up" data-aos-delay="30">
                        <div class="icon bg-one">
                            <i class="flaticon-analytics"></i>
                        </div>
                        <div class="text">
                            <h3 class="title"><a href="service-details.html">Digital analysis</a></h3>
                            <p>Proin mollis luctus turpis, eget cursus magna tincidunt vitae. Quisque ut volutpat arcu. Praesent ultrices turpis </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="block-style-two block-icon-animate animated-hover-icon d-flex mb-30" data-aos="fade-up" data-aos-delay="40">
                        <div class="icon bg-two">
                            <i class="flaticon-email"></i>
                        </div>
                        <div class="text">
                            <h3 class="title"><a href="service-details.html">Email Marketing</a></h3>
                            <p>Proin mollis luctus turpis, eget cursus magna tincidunt vitae. Quisque ut volutpat arcu. Praesent ultrices turpis </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="block-style-two block-icon-animate animated-hover-icon d-flex mb-30" data-aos="fade-up" data-aos-delay="50">
                        <div class="icon bg-three">
                            <i class="flaticon-digital-marketing"></i>
                        </div>
                        <div class="text">
                            <h3 class="title"><a href="service-details.html">Digital Marketing</a></h3>
                            <p>Proin mollis luctus turpis, eget cursus magna tincidunt vitae. Quisque ut volutpat arcu. Praesent ultrices turpis </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="block-style-two block-icon-animate animated-hover-icon d-flex mb-30" data-aos="fade-up" data-aos-delay="60">
                        <div class="icon bg-four">
                            <i class="flaticon-content"></i>
                        </div>
                        <div class="text">
                            <h3 class="title"><a href="service-details.html">Content Marketing</a></h3>
                            <p>Proin mollis luctus turpis, eget cursus magna tincidunt vitae. Quisque ut volutpat arcu. Praesent ultrices turpis </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial-area testimonial-style-one gray-light pt-120 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="text-wrapper mb-50" data-sal="slide-up" data-sal-delay="400">
                        <div class="section-title mb-30">
                            <span class="sub-title sub-title-bg">Pricing Table</span>
                            <h2>What they are
                                telling about Us</h2>
                        </div>
                        <p>2356+ clients Trusted Us</p>
                        <div class="testimonial-arrows d-flex"></div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="testimonial-slider-one mb-50">
                        <div class="testimonial-item" data-aos="fade-up">
                            <div class="testimonial-content">
                                <p>Phasellus eget leo sit amet massa lobortis condimentum. Suspendisse potenti. Pellentesque non orci arcu. Quisque tincidunt euismod erat id euismod.</p>
                                <div class="author-thumb-title" >
                                    <div class="author-thumb">
                                        <img src="{{ asset('website') }}/images/testimonial/img-1.jpg" alt="">
                                    </div>
                                    <div class="author-title">
                                        <h5>Michelle yeoh</h5>
                                        <p class="position">Senior Designer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item" data-aos="fade-up">
                            <div class="testimonial-content">
                                <p>Phasellus eget leo sit amet massa lobortis condimentum. Suspendisse potenti. Pellentesque non orci arcu. Quisque tincidunt euismod erat id euismod.</p>
                                <div class="author-thumb-title">
                                    <div class="author-thumb">
                                        <img src="{{ asset('website') }}/images/testimonial/img-2.jpg" alt="">
                                    </div>
                                    <div class="author-title">
                                        <h5>Michelle yeoh</h5>
                                        <p class="position">Senior Designer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item" data-aos="fade-up">
                            <div class="testimonial-content">
                                <p>Phasellus eget leo sit amet massa lobortis condimentum. Suspendisse potenti. Pellentesque non orci arcu. Quisque tincidunt euismod erat id euismod.</p>
                                <div class="author-thumb-title">
                                    <div class="author-thumb">
                                        <img src="{{ asset('website') }}/images/testimonial/img-1.jpg" alt="">
                                    </div>
                                    <div class="author-title">
                                        <h5>Michelle yeoh</h5>
                                        <p class="position">Senior Designer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pricing-area pricing-style-one pt-120 pb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="section-title text-center mb-55" data-aos="fade-up" data-aos-delay="30">
                        <span class="sub-title sub-title-bg">Pricing Table</span>
                        <h2>Provide Awesome
                            pricing plan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="pricing-item pricing-item-one block-icon-animate mb-40" data-aos="fade-up" data-aos-delay="40">
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
                    <div class="pricing-item pricing-item-one block-icon-animate mb-40" data-aos="fade-up" data-aos-delay="50">
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
                    <div class="pricing-item pricing-item-one block-icon-animate mb-40" data-aos="fade-up" data-aos-delay="60">
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

    <section class="blog-area blog-three-column pb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center mb-55" data-aos="fade-up" data-aos-delay="30">
                        <span class="sub-title sub-title-bg">Blog & News</span>
                        <h2>latest Blog & News</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class="blog-post-item mb-40" data-aos="fade-up" data-aos-delay="40">
                        <div class="post-thumbnail">
                            <img src="{{ asset('website') }}/images/blog/img-1.jpg" alt="Blog Image">
                        </div>
                        <div class="entry-content">
                            <div class="post-meta">
                                <ul>
                                    <li><span class="date"><i class="far fa-calendar-alt"></i><a href="#">20 dec, 2021</a></span></li>
                                </ul>
                            </div>
                            <h3 class="title"><a href="blog-details.html">Most widely known for their popular</a></h3>
                            <p>Mauris mollis hendrerit laoreet. Pellentesque justo orci, </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class="blog-post-item mb-40" data-aos="fade-up" data-aos-delay="50">
                        <div class="post-thumbnail">
                            <img src="{{ asset('website') }}/images/blog/img-2.jpg" alt="Blog Image">
                        </div>
                        <div class="entry-content">
                            <div class="post-meta">
                                <ul>
                                    <li><span class="date"><i class="far fa-calendar-alt"></i><a href="#">20 dec, 2021</a></span></li>
                                </ul>
                            </div>
                            <h3 class="title"><a href="blog-details.html">They lay out all the common benefits</a></h3>
                            <p>Mauris mollis hendrerit laoreet. Pellentesque justo orci, </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class="blog-post-item mb-40" data-aos="fade-up" data-aos-delay="60">
                        <div class="post-thumbnail">
                            <img src="{{ asset('website') }}/images/blog/img-3.jpg" alt="Blog Image">
                        </div>
                        <div class="entry-content">
                            <div class="post-meta">
                                <ul>
                                    <li><span class="date"><i class="far fa-calendar-alt"></i><a href="#">20 dec, 2021</a></span></li>
                                </ul>
                            </div>
                            <h3 class="title"><a href="blog-details.html">See what is working for other businesses</a></h3>
                            <p>Mauris mollis hendrerit laoreet. Pellentesque justo orci, </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-area cta-style-one blue-dark">
        <div class="shape shape-one scene"><span data-depth="5"></span></div>
        <div class="shape shape-two scene"><span data-depth=".5"></span></div>
        <div class="shape shape-three scene"><span data-depth="3"></span></div>
        <div class="shape shape-four scene"><span data-depth="4"></span></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-wrapper pt-90 pb-100" data-aos="fade-up" data-aos-delay="30">
                        <div class="section-title section-title-white">
                            <h2>Subscribe now to Our
                                Newsletter
                            </h2>
                        </div>
                        <form>
                            <div class="form_group">
                                <input type="email" class="form_control" placeholder="Email Adress...." name="name" required>
                                <button class="main-btn btn-blue-dark">Subscribe Now</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="cta-img"><img src="{{ asset('website') }}/images/cta/cta-img-1.png" alt="CTA Image"></div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('_js')

@endpush
