<?php

namespace App\Http\Core;

class Frontend extends Controller
{
    public function __construct()
    {
        $this->_cekSession();
    }
    function _cekSession()
    {
        if (session('loggedIn'))
            return redirect()->route('home')->send();
    }
}
