<?php

namespace App\Http\Controllers\User;

use App\Http\Core\Backend;
use Illuminate\Http\Request;

class Home extends Backend
{
    public function index()
    {
        $backgroundImage = "hero-bg.jpg";
        return view('user.home.home', [
            'backgroundImage' => $backgroundImage
        ]);
    }
    public function profil(Request $request)
    {
        $backgroundImage = "hero-bg.jpg";
        $result = get(parent::$urlApi . "digifest_profil/" . $request->session()->get('id'));
        // debug($result);
        return view('user.home.profil', [
            'backgroundImage' => $backgroundImage,
            'baseImg' => parent::$baseImg,
            'data' => $result
        ]);
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }
}
