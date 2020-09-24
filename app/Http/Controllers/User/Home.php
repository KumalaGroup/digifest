<?php

namespace App\Http\Controllers\User;

use App\Http\Core\Backend;
use Illuminate\Http\Request;

class Home extends Backend
{
    public function __construct()
    {
        parent::__construct();
        parent::_cekRoute();
    }
    public function index()
    {
        $backgroundImage = "hero-bg.jpg";
        return view('user.home.home', [
            'backgroundImage' => $backgroundImage
        ]);
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }
}
