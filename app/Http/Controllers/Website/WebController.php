<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

    public function register () {
        return view('website.register');
    }

    public function userRegister (Request $request) {
        $this->validate($request, [
            'username'  => 'required|alpha_num|max:20|unique:users',
            'name'      => 'required|max:191',
            'email'     => 'required|email|max:191|unique:users',
            'phone'     => 'required|max:15|unique:users',
            'password'  => 'required|string|min:8|max:50|confirmed'
        ]);

        try {
           $user = User::create([
                'username'          => strtolower($request->username),
                'name'              => $request->name,
                'email'             => $request->email,
                'phone'             => $request->phone,
                'status'            => "Active",
                'password'          => Hash::make($request->password),
                'email_verified_at' => now(),
            ]);

           if ($user) {
               Mail::to($user->email)->send(new RegisterMail($user));
           }

           return redirect()->back()->with('success', 'Your Register has been successfully. Please check your email');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
