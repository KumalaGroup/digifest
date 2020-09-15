<?php

namespace App\Http\Controllers\User;

use App\Http\Core\Frontend;
use Illuminate\Http\Request;

class Login extends Frontend
{
    public function index()
    {
        $backgroundImage = "hero-bg.jpg";
        return view('user.login.login', [
            'backgroundImage' => $backgroundImage
        ]);
    }

    public function daftar()
    {
        $backgroundImage = "hero-bg.jpg";
        return view('user.login.daftar', [
            'backgroundImage' => $backgroundImage
        ]);
    }
}
