<?php

namespace App\Http\Controllers\User;

use App\Http\Core\Frontend;
use Illuminate\Http\Request;


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
            return response()->json($result);
        } else {
            $result = get(parent::$urlApi . "bg_login");
            return view('user.login.login', [
                'backgroundImage' => empty($result) ? 'https://digitalsynopsis.com/wp-content/uploads/2017/02/beautiful-color-gradients-backgrounds-018-cloudy-knoxville.png' : parent::$baseImg . 'background/' . $result->gambar
            ]);
        }
    }

    public function daftar(Request $request)
    {
        if ($request->isMethod("post")) {
            foreach ($request->all() as $k => $v)
                $data[$k] = preg_replace('#<script(.*?)>(.*?)</script>#is', '', strip_tags($v));
            $result = post(parent::$urlApi . 'digifest_register', $data);
            return response()->json($result);
        } else {
            $result = get(parent::$urlApi . "bg_login");
            return view('user.login.daftar', [
                'backgroundImage' => empty($result) ? 'https://digitalsynopsis.com/wp-content/uploads/2017/02/beautiful-color-gradients-backgrounds-018-cloudy-knoxville.png' : parent::$baseImg . 'background/' . $result->gambar
            ]);
        }
    }
}
