<?php

namespace App\Http\Core;

use Closure;

class Backend extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, Closure $next) {
            $this->_cekSession();
            return $next($request);
        });
        $this->_cekRoute();
    }
    function _cekSession()
    {
        $loggedIn = session('loggedIn');
        if (!$loggedIn) return redirect()->route('login')->send();
    }
    function _cekRoute()
    {
        $brand = request()->segment(1);
        if (isset($brand) && !in_array($brand, ["wuling", "hino", "mercedes-benz", "honda", "mazda", "keluar", "profil"]))
            return abort(404);
    }
}
