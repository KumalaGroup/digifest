<?php

namespace App\Http\Controllers\Admin;

use App\Http\Core\Backend;
use Closure;
use Illuminate\Http\Request;

class Home extends Backend
{
    public function __construct()
    {
        $this->middleware(function ($request, Closure $next) {
            parent::_cekSession("isAdmin");
            return $next($request);
        });
    }
    public function index(Request $request)
    {
        return view('admin.pages.home');
    }
}
