<?php

namespace App\Http\Core;

use Closure;

class Backend extends Controller
{
    public $backgroundImageDT;
    public $backgroundImageM;
    
    public function __construct()
    {
        $this->middleware(function ($request, Closure $next) {
            $this->_cekSession();
            return $next($request);
        });
        $this->_cekRoute();

        $backgroundImage = get(parent::$urlApi . "bg_main_stage");
        $this->backgroundImageDT = empty($backgroundImage) ? 'https://digitalsynopsis.com/wp-content/uploads/2017/02/beautiful-color-gradients-backgrounds-018-cloudy-knoxville.png' : parent::$baseImg . 'background/' . $backgroundImage->gambar_dt;
        $this->backgroundImageM  =  empty($backgroundImage) ? 'https://digitalsynopsis.com/wp-content/uploads/2017/02/beautiful-color-gradients-backgrounds-018-cloudy-knoxville.png' : parent::$baseImg . 'background/' . $backgroundImage->gambar_m;
    }
    function _cekSession()
    {
        $loggedIn = session('loggedIn');
        if (!$loggedIn) return redirect()->route('login')->send();
    }
    function _cekRoute()
    {
        $uri = request()->segment(1);
        if (isset($uri) && !in_array($uri, [
            "wuling", "hino", "mercedes-benz", "honda", "mazda", "keluar",
            "profil", "transaksi"
        ]))
            return abort(404);
    }
}
