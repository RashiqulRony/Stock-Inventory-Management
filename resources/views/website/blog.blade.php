@extends('layouts.web')

@section('title')
    Blog
@endsection

@section('_seo')
    <meta property="og:title" content="RonInve | Blog">
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
                            <h1 class="title">Blog</h1>
                            <ul class="breadcrumbs-link">
                                <li><a href="{{ route('web.home') }}">Home</a></li>
                                <li class="active">Blog</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-area pt-120 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-standard-wrapper mb-50">
                        <div class="blog-post-item mb-30" data-aos="fade-up" data-aos-delay="20">
                            <div class="post-thumbnail">
                                <img src="{{ asset('website') }}/images/blog/blog-standard-1.jpg" alt="Blog Image">
                            </div>
                            <div class="entry-content">
                                <div class="post-meta">
                                    <ul>
                                        <li><span class="date"><i class="far fa-calendar-alt"></i><a href="#">20 dec, 2022</a></span></li>
                                    </ul>
                                </div>
                                <h3 class="title"><a href="blog-details.html">Innovation is nothing more than
                                        thinking</a></h3>
                                <p>Integer tellus turpis, vulputate ac condimentum vel, fermentum a dui. Fusce efficitur aliquet mi, tincidunt condimentum orci maximus quis. Phasellus quis urna in quam sollicitudin ultricies. Suspendisse bibendum mi diam, sit amet condimentum sapien porttitor nec. Sed eget turpis vestibulum, posuere est a, euismod sapien.</p>
                                <div class="post-bottom d-flex justify-content-between">
                                    <a href="blog-details.html" class="btn_link">Read More</a>
                                    <a href="#" class="comment"><i class="far fa-comment-dots"></i> 3 Comments</a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-post-item mb-30" data-aos="fade-up" data-aos-delay="30">
                            <div class="post-thumbnail">
                                <img src="{{ asset('website') }}/images/blog/blog-standard-1.jpg" alt="Blog Image">
                            </div>
                            <div class="entry-content">
                                <div class="post-meta">
                                    <ul>
                                        <li><span class="date"><i class="far fa-calendar-alt"></i><a href="#">20 dec, 2022</a></span></li>
                                    </ul>
                                </div>
                                <h3 class="title"><a href="blog-details.html">Increasing your efficiency on your
                                        thought process</a></h3>
                                <p>Integer tellus turpis, vulputate ac condimentum vel, fermentum a dui. Fusce efficitur aliquet mi, tincidunt condimentum orci maximus quis. Phasellus quis urna in quam sollicitudin ultricies. Suspendisse bibendum mi diam, sit amet condimentum sapien porttitor nec. Sed eget turpis vestibulum, posuere est a, euismod sapien.</p>
                                <div class="post-bottom d-flex justify-content-between">
                                    <a href="blog-details.html" class="btn_link">Read More</a>
                                    <a href="#" class="comment"><i class="far fa-comment-dots"></i> 3 Comments</a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-post-item mb-30" data-aos="fade-up" data-aos-delay="40">
                            <div class="post-thumbnail">
                                <img src="{{ asset('website') }}/images/blog/blog-standard-1.jpg" alt="Blog Image">
                            </div>
                            <div class="entry-content">
                                <div class="post-meta">
                                    <ul>
                                        <li><span class="date"><i class="far fa-calendar-alt"></i><a href="#">20 dec, 2022</a></span></li>
                                    </ul>
                                </div>
                                <h3 class="title"><a href="blog-details.html">Taking you forward through your
                                        innovations</a></h3>
                                <p>Integer tellus turpis, vulputate ac condimentum vel, fermentum a dui. Fusce efficitur aliquet mi, tincidunt condimentum orci maximus quis. Phasellus quis urna in quam sollicitudin ultricies. Suspendisse bibendum mi diam, sit amet condimentum sapien porttitor nec. Sed eget turpis vestibulum, posuere est a, euismod sapien.</p>
                                <div class="post-bottom d-flex justify-content-between">
                                    <a href="blog-details.html" class="btn_link">Read More</a>
                                    <a href="#" class="comment"><i class="far fa-comment-dots"></i> 3 Comments</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-pagination mb-50" data-aos="fade-up" data-aos-delay="45">
                        <ul>
                            <li><a href="#">01</a></li>
                            <li><a href="#">02</a></li>
                            <li><a href="#">03</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar-widget-area mb-20">
                        <div class="widget search-widget mb-30" data-aos="fade-up" data-aos-delay="20">
                            <h4 class="widget-title">Search</h4>
                            <div class="search-form">
                                <form>
                                    <div class="form_group">
                                        <input type="email" class="form_control" placeholder="Search...." name="name" required>
                                        <button class="search-btn"><i class="fas fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="widget category-widget mb-30" data-aos="fade-up" data-aos-delay="25">
                            <h4 class="widget-title">Category</h4>
                            <ul class="category-nav">
                                <li><a href="#">Email Marketing</a></li>
                                <li><a href="#">Business Analysis</a></li>
                                <li><a href="#">Product Design</a></li>
                                <li><a href="#">Product Design</a></li>
                                <li><a href="#">Invoice thiking</a></li>
                            </ul>
                        </div>
                        <div class="widget recent-post-widget mb-30" data-aos="fade-up" data-aos-delay="30">
                            <h4 class="widget-title">Recent Post</h4>
                            <ul class="recent-post-list">
                                <li class="post-thumbnail-content">
                                    <img src="{{ asset('website') }}/images/blog/post-thumb-1.jpg" alt="Thumb Image">
                                    <div class="post-title-date">
                                        <span class="posted-on"><i class="far fa-calendar-alt"></i><a href="#">20 dec, 2022</a></span>
                                        <h6><a href="blog-details.html">Ballantyne, dairy
                                                innovation</a></h6>
                                    </div>
                                </li>
                                <li class="post-thumbnail-content">
                                    <img src="{{ asset('website') }}/images/blog/post-thumb-2.jpg" alt="Thumb Image">
                                    <div class="post-title-date">
                                        <span class="posted-on"><i class="far fa-calendar-alt"></i><a href="#">20 dec, 2022</a></span>
                                        <h6><a href="blog-details.html">Innovation comes
                                                from acceptance</a></h6>
                                    </div>
                                </li>
                                <li class="post-thumbnail-content">
                                    <img src="{{ asset('website') }}/images/blog/post-thumb-3.jpg" alt="Thumb Image">
                                    <div class="post-title-date">
                                        <span class="posted-on"><i class="far fa-calendar-alt"></i><a href="#">20 dec, 2022</a></span>
                                        <h6><a href="blog-details.html">Don’t hesitate to ask
                                                and innovate</a></h6>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="widget tag-cloud-widget mb-30" data-aos="fade-up" data-aos-delay="35">
                            <h4 class="widget-title">Tags</h4>
                            <a href="#">Corporate</a>
                            <a href="#">Software</a>
                            <a href="#">Landing</a>
                            <a href="#">Saas</a>
                            <a href="#">Corporate</a>
                            <a href="#">Design</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('_js')

@endpush
