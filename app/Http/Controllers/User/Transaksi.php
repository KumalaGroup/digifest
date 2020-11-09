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
            return response()->json($result);
        } else {
            $result = (object) array(
                "cart" => get(parent::$urlApi . 'digifest_cart/' . $request->session()->get('id')),
                "riwayat" => get(parent::$urlApi . 'digifest_riwayat/' . $request->session()->get('id'))
            );
            return view('user.transaksi.index', ['data' => $result, 'backgroundImage' => $this->background]);
        }
    }
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            foreach ($request->all() as $k => $v)
                $data[$k] = preg_replace('#<script(.*?)>(.*?)</script>#is', '', strip_tags($v));
            $rand = generateKode(4);
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
                if ($request->hasFile('foto_ktp'))
                    $request->foto_ktp->move('../assets/img_marketing/checkout', $data['foto_ktp']);
                if ($request->hasFile('foto_kk'))
                    $request->foto_kk->move('../assets/img_marketing/checkout', $data['foto_kk']);
                if ($request->hasFile('foto_reklis'))
                    $request->foto_reklis->move('../assets/img_marketing/checkout', $data['foto_reklis']);
            }
            return response()->json($result);
        } else {
            if ($request->has('loadData')) {
                $result = array(
                    'provinsi' => get(parent::$urlApi . "digifest_provinsi"),
                    'cabang' => get(parent::$urlApi . "digifest_cabang/" . $request->brand)
                );
                return response()->json($result);
            } elseif ($request->has('kd')) {
                $result = get(parent::$urlApi . "digifest_profil/" . $request->session()->get('id'));
                return view('user.transaksi.create', ['data' => $result, 'backgroundImage' => $this->background]);
            }
        }
    }
    public function detail(Request $request)
    {
        $result = get(parent::$urlApi . 'digifest_riwayat/' .
            $request->session()->get('id') . '/' . $request->kdinvdg);
        return view('user.transaksi.detail', ['data' => $result, 'backgroundImage' => $this->background]);
    }

    public function confirm(Request $request)
    {
        if ($request->isMethod('post')) {
            foreach ($request->all() as $k => $v)
                $data[$k] = preg_replace('#<script(.*?)>(.*?)</script>#is', '', strip_tags($v));
            $rand = generateKode(4);
            $customer = $request->session()->get('id');
            if ($request->hasFile('bukti_bayar')) {
                $file = $request->bukti_bayar;
                $data['bukti_bayar'] = $customer . $rand . date("dmYHis") . 'bukti.' . $file->getClientOriginalExtension();
            }
            $result = post(parent::$urlApi . 'digifest_confirm', $data);
            if ($result->status == "success") {
                if ($request->hasFile('bukti_bayar')) {
                    $request->bukti_bayar->move('../assets/img_marketing/checkout/bukti', $data['bukti_bayar']);
                }
            }
            return response()->json($result);
        } else {
            $no_transaksi = json_decode(base64_decode($request->kdinvdg));
            return view('user.transaksi.confirm', array(
                'no_transaksi' => $no_transaksi[0],
                'backgroundImage' => $this->background
            ));
        }
    }
}
