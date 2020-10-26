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
            $data['customer'] = $request->session()->get('id');
            $result = post(parent::$urlApi . 'digifest_cart', $data);
            return json_encode($result, JSON_PRETTY_PRINT);
        } else {
            $result = get(parent::$urlApi . 'digifest_cart/' . $request->session()->get('id'));
            return view('user.transaksi.index', ['data' => $result]);
        }
    }
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            foreach ($request->all() as $k => $v)
                $data[$k] = preg_replace('#<script(.*?)>(.*?)</script>#is', '', strip_tags($v));
            $rand = generateKode(5);
            $customer = $request->session()->get('id');
            if ($request->hasFile('foto_ktp')) {
                $file = $request->foto_ktp;
                $data['foto_ktp'] = $customer . $rand . date("dmYHis") . 'ktp.' . $file->getClientOriginalExtension();
            }
            if ($request->hasFile('foto_kk')) {
                $file = $request->foto_kk;
                $data['foto_kk'] = $customer . $rand . date("dmYHis") . 'kk.' . $file->getClientOriginalExtension();
            }
            if ($request->hasFile('foto_reklis')) {
                $file = $request->foto_reklis;
                $data['foto_reklis'] = $customer . $rand . date("dmYHis") . 'reklis.' . $file->getClientOriginalExtension();
            }
            $data['customer'] = $customer;
            $result = post(parent::$urlApi . 'digifest_checkout', $data);
            if ($result->status == "success") {
                if ($request->hasFile('foto_ktp')) $request->foto_ktp->move('../assets/img_marketing/checkout', $data['foto_ktp']);
                if ($request->hasFile('foto_kk')) $request->foto_kk->move('../assets/img_marketing/checkout', $data['foto_kk']);
                if ($request->hasFile('foto_reklis')) $request->foto_reklis->move('../assets/img_marketing/checkout', $data['foto_reklis']);
            }
            return json_encode($result, JSON_PRETTY_PRINT);
        } else {
            if ($request->has('provinsi')) {
                $result = get(parent::$urlApi . "digifest_provinsi");
                return json_encode($result, JSON_PRETTY_PRINT);
            } elseif ($request->has('kd')) {
                $result = get(parent::$urlApi . "digifest_profil/" . $request->session()->get('id'));
                return view('user.transaksi.create', ['data' => $result]);
            }
        }
    }
}
