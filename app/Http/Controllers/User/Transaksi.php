<?php

namespace App\Http\Controllers\User;

use App\Http\Core\Backend;
use Illuminate\Http\Request;

class Transaksi extends Backend
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            foreach ($request->all() as $k => $v)
                $data[$k] = preg_replace('#<script(.*?)>(.*?)</script>#is', '', strip_tags($v));
            $result = post(parent::$urlApi . 'digifest_cart', $data);
            return json_encode($result, JSON_PRETTY_PRINT);
        } else {
            $backgroundImage = "hero-bg.jpg";
            $result = get(parent::$urlApi . 'digifest_cart/' . $request->session()->get('id'));
            return view('user.transaksi.index', [
                'backgroundImage' => $backgroundImage,
                'data' => $result
            ]);
        }
    }
}
