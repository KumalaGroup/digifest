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
        if (!session('loggedIn') && $role == "isAdmin") return redirect()->route('loginAdmin')->send();
        elseif (!session('loggedIn')) return redirect()->route('login')->send();
    }
    function _cekRoute()
    {
        $brand = request()->segment(1);
        if (isset($brand) && !in_array($brand, ["wuling", "hino", "mercedes", "honda", "mazda", "keluar"]))
            return abort(404);
    }
}
