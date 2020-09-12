<?php

namespace App\Http\Controllers;

use App\Http\Core\Frontend;
use Illuminate\Http\Request;

class Login extends Frontend
{
    public function index()
    {
        $backgroundImage = "hero-bg.jpg";
        return view('login.login', [
            'backgroundImage' => $backgroundImage
        ]);
    }

    public function daftar()
    {
        $backgroundImage = "hero-bg.jpg";
        return view('login.daftar', [
            'backgroundImage' => $backgroundImage
        ]);
    }
}
