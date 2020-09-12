<?php

namespace App\Http\Core;

use Illuminate\Http\Request;

class Backend extends Controller
{
    public function __construct()
    {
        // $this->_cekSession();
    }
    function _cekSession()
    {
        if (!session('loggedIn'))
            return redirect()->route('login')->send();
    }
    function _cekRoute()
    {
        $brand = request()->segment(1);
        if (isset($brand) && !in_array($brand, ["wuling", "hino", "mercedes", "honda", "mazda"]))
            return abort(404);
    }
}
