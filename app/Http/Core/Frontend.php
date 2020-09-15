<?php

namespace App\Http\Core;

class Frontend extends Controller
{
    public function __construct()
    {
        $this->_cekSession();
    }
    function _cekSession($role = false)
    {
        if (session('loggedIn') && $role == "isAdmin") return redirect()->route('homeAdmin')->send();
        elseif (session('loggedIn')) return redirect()->route('home')->send();
    }
}
