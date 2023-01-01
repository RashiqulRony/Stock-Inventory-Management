<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function index($account, $domain, $com){
        if($account != "www" && $domain == "roninve"){
            if (!empty($account)){
                $domainInfo = User::where('domain', $account)->first();
                if (!empty($domainInfo)){
                    return view('layouts.user_app');
                }else{
                    dd('Your store is deactivated');
                }
            }else{
                dd('Your request is invalid');
            }
        }else{
            return view('errors.404');
        }
    }
}
