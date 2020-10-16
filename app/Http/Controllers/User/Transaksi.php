<?php

namespace App\Http\Controllers\User;

use App\Http\Core\Backend;
use Illuminate\Http\Request;

class Transaksi extends Backend
{
    public function index(Request $request)
    {
        $backgroundImage = "hero-bg.jpg";
        return view('user.transaksi.index', [
            'backgroundImage' => $backgroundImage
        ]);
    }
}
