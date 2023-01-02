<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home () {
        return view('website.home');
    }

    public function about () {
        return view('website.about');
    }

    public function service () {
        return view('website.service');
    }

    public function pricing () {
        return view('website.pricing');
    }

    public function blog () {
        return view('website.blog');
    }

    public function contact () {
        return view('website.contact');
    }
}
