<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function index(){
        return view('layouts.user_app');
    }
}
