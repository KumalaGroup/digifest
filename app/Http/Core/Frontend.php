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
    private function _cekSession()
    {
        $loggedIn = session('loggedIn');
        if ($loggedIn) return redirect()->route('home')->send();
    }
}
