@extends('layouts.web')

@section('title')
    Register
@endsection

@section('_seo')
    <meta property="og:title" content="RonInve | Register">
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
<style>
    .contact-form form .form_control {
        margin-bottom: 0!important;
        margin-top: 20px!important;
    }

    .contact-form form .form_control {
        background-color: #e7e7e7;
        border: 1px solid #ccc;
    }
</style>
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
                            <h1 class="title">Register</h1>
                            <ul class="breadcrumbs-link">
                                <li><a href="{{ route('web.home') }}">Home</a></li>
                                <li class="active">Register</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-information-area pt-120 pb-70">
        <div class="container">
            <div class="contact-wrapper" data-aos="fade-up" data-aos-delay="20">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        @if (session('success'))
                            <div class="alert alert-success text-center" role="alert">
                                {{ session('success') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger text-center" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="section-title text-center mb-35">
                            <h2>Your Information</h2>
                        </div>
                    </div>
                </div>
                <div class="contact-form">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('web.userRegister') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form_group">
                                            <input type="text" class="form_control" value="{{ old('domain') }}" placeholder="Domain Name*" name="domain" required>
                                            @error('domain')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form_group">
                                            <input type="text" class="form_control" value="{{ old('name') }}" placeholder="Full Name*" name="name" required>
                                            @error('name')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form_group">
                                            <input type="text" class="form_control" value="{{ old('phone') }}" placeholder="Phone Number*" name="phone" required>
                                            @error('phone')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form_group">
                                            <input type="email" class="form_control" value="{{ old('email') }}" placeholder="Email*" name="email" required>
                                            @error('email')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form_group">
                                            <input type="password" class="form_control" placeholder="Password*" name="password" required>
                                            @error('password')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form_group">
                                            <input type="password" class="form_control" placeholder="Confirm Password*" name="password_confirmation" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form_group text-center mt-3">
                                            <button class="main-btn btn-gradient-yellow">Register</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('_js')

@endpush
