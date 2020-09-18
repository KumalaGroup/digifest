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
    }
    function _cekSession($role = false)
    {
        $loggedIn = session('loggedIn');
        if (!$loggedIn && $role == "isAdmin") return redirect()->route('loginAdmin')->send();
        elseif (!$loggedIn) return redirect()->route('login')->send();
        elseif ($loggedIn && $loggedIn == "BackAdmin" && $role == false) return redirect()->route('login')->send();
        elseif ($loggedIn && $loggedIn == "FrontUser" && $role == "isAdmin") return redirect()->route('loginAdmin')->send();
    }
    function _cekRoute()
    {
        $brand = request()->segment(1);
        if (isset($brand) && !in_array($brand, ["wuling", "hino", "mercedes", "honda", "mazda", "keluar"]))
            return abort(404);
    }
}
