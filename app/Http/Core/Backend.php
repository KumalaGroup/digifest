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
            $this->_visitorCounter();
            return $next($request);
        });
        $this->_cekRoute();

        $backgroundImage = get(parent::$urlApi . "bg_main_stage");
        $this->backgroundImageDT = empty($backgroundImage) ? 'https://digitalsynopsis.com/wp-content/uploads/2017/02/beautiful-color-gradients-backgrounds-018-cloudy-knoxville.png' : parent::$baseImg . 'background/' . $backgroundImage->gambar_dt;
        $this->backgroundImageM  =  empty($backgroundImage) ? 'https://digitalsynopsis.com/wp-content/uploads/2017/02/beautiful-color-gradients-backgrounds-018-cloudy-knoxville.png' : parent::$baseImg . 'background/' . $backgroundImage->gambar_m;
    }
    private function _cekSession()
    {
        $loggedIn = session('loggedIn');
        if (!$loggedIn) return redirect()->route('login')->send();
    }
    private function _cekRoute()
    {
        $uri = request()->segment(1);
        if (isset($uri) && !in_array($uri, [
            "wuling", "hino", "mercedes-benz", "honda", "mazda", "keluar",
            "profil", "transaksi"
        ]))
            return abort(404);
    }
    private function _visitorCounter()
    {
        $sessionIpAddress = session('ipAddress');
        if (!$sessionIpAddress) {
            $user_agent = $_SERVER['HTTP_USER_AGENT'];
            $browser = "N/A";

            $browsers = array(
                '/msie/i' => 'Internet explorer',
                '/firefox/i' => 'Firefox',
                '/safari/i' => 'Safari',
                '/chrome/i' => 'Chrome',
                '/edge/i' => 'Edge',
                '/opera/i' => 'Opera',
                '/mobile/i' => 'Mobile browser'
            );

            foreach ($browsers as $regex => $value) {
                if (preg_match($regex, $user_agent)) {
                    $browser = $value;
                }
            }

            $ipAddress = $_SERVER['REMOTE_ADDR'];
            session(array('ipAddress' => $ipAddress));
            $result = post(parent::$urlApi . 'degifest_counter', array(
                'ipAddress' => $ipAddress,
                'browser' => $browser,
                'customer' => session('id')
            ));
            if (is_null($result) || (isset($result) && $result->status === 'error')) {
                session()->flush();
                return redirect()->route('login')->send();
            }
        }
    }
}
