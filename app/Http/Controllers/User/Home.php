<?php

namespace App\Http\Controllers\User;

use App\Http\Core\Backend;
use Illuminate\Http\Request;

class Home extends Backend
{
    public function index(Request $request)
    {
        if ($request->has('rundown')) {
            $result = get(parent::$urlApi . "digifest_rundown/" . $request->date);
            return response()->json($result);
        } else {
            $result = get(parent::$urlApi . "digifest_main");
            return view('user.home.home', [
                'data' => $result,
                'backgroundImage' => $this->background
            ]);
        }
    }
    public function profil(Request $request)
    {
        if ($request->isMethod("post")) {
            if ($request->hasFile('gambar')) {
                $file = $request->gambar;
                $fileName = date("dmYHis") . '.' . $file->getClientOriginalExtension();
                $result = post(parent::$urlApi . "digifest_profil", ['id' => $request->id, 'gambar' => $fileName]);
                if ($result->status === "success") $request->gambar->move('../assets/img_marketing/customer', $fileName);
            } else {
                foreach ($request->all() as $k => $v)
                    $data[$k] = preg_replace('#<script(.*?)>(.*?)</script>#is', '', strip_tags($v));
                $data['tanggal_lahir'] = tgl_sql($data['tanggal_lahir']);
                $result = post(parent::$urlApi . "digifest_profil", $data);
            }
            return response()->json($result);
        } else {
            $result = get(parent::$urlApi . "digifest_profil/" . $request->session()->get('id'));
            return view('user.home.profil', [
                'baseImg'         => parent::$baseImg,
                'data'            => $result,
                'backgroundImage' => $this->background
            ]);
        }
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }
}
