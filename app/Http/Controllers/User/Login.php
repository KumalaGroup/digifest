<?php

namespace App\Http\Controllers\User;

use App\Http\Core\Frontend;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

use function GuzzleHttp\json_decode;

class Login extends Frontend
{
    public function index(Request $request)
    {
        if ($request->isMethod("post")) {
            foreach ($request->all() as $k => $v)
                $data[$k] = preg_replace('#<script(.*?)>(.*?)</script>#is', '', strip_tags($v));
            $result = post(parent::$urlApi . 'digifest_login', $data);
            if ($result->status === "success")
                session([
                    'loggedIn' => "KumalaVirtualFairLoggged",
                    'id' => $result->data->id,
                    'nama' => $result->data->nama,
                    'email' => $result->data->email
                ]);
            return json_encode($result, JSON_PRETTY_PRINT);
        } else {
            $backgroundImage = "hero-bg.jpg";
            return view('user.login.login', [
                'backgroundImage' => $backgroundImage
            ]);
        }
    }

    public function daftar(Request $request)
    {
        if ($request->isMethod("post")) {
            foreach ($request->all() as $k => $v)
                $data[$k] = preg_replace('#<script(.*?)>(.*?)</script>#is', '', strip_tags($v));
            $result = post(parent::$urlApi . 'digifest_register', $data);
            return json_encode($result, JSON_PRETTY_PRINT);
        } else {
            $backgroundImage = "hero-bg.jpg";
            return view('user.login.daftar', [
                'backgroundImage' => $backgroundImage
            ]);
        }
    }
}
