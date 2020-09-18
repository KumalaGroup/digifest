<?php

namespace App\Http\Core;

use Closure;

class Frontend extends Controller
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
        if ($loggedIn && $loggedIn == "BackAdmin" && $role == "isAdmin") return redirect()->route('homeAdmin')->send();
        elseif ($loggedIn && $loggedIn == "FrontUser") return redirect()->route('home')->send();
    }
}
