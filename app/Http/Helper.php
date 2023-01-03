<?php

use App\Models\User;

if (!function_exists('getDomain')) {
    function getDomain(){
        return '.roninve.local';
    }
}

if (!function_exists('myLoader')) {
    function myLoader(){
        $src = asset('frontend/loader.gif');
        return $src;
    }
}

if (!function_exists('getDomainInfo')) {
    function getDomainInfo($domain){
        $domainInfo  = User::where('domain', $domain)->first();
        return $domainInfo;
    }
}

if (!function_exists('getDomainAuthInfo')) {
    function getDomainAuthInfo(){
        $requestHost = request()->getHttpHost();
        $domainName =  str_replace(getDomain(),"",$requestHost);
        $domainInfo = getDomainInfo($domainName);
        $data = User::find($domainInfo->id);
        return $data;
    }
}

if (!function_exists('removeHttp')) {
    function removeHttp($url) {
        $disallowed = array('http://', 'https://', 'www.');
        foreach($disallowed as $d) {
            if(strpos($url, $d) === 0) {
                return str_replace($d, '', $url);
            }
        }
        return $url;
    }
}
