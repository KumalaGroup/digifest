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
        if (session('loggedIn') && $role == "isAdmin") return redirect()->route('homeAdmin')->send();
        elseif (session('loggedIn')) return redirect()->route('home')->send();
    }
}
