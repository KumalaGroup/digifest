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
        $uri = request()->segment(1);
        if (isset($uri) && !in_array($uri, [
            "wuling", "hino", "mercedes-benz", "honda", "mazda", "keluar",
            "profil", "transaksi"
        ]))
            return abort(404);
    }
}
