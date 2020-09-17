<?php

namespace App\Http\Controllers\User;

use App\Http\Core\Frontend;
use App\Models\User;
use Illuminate\Http\Request;

class Login extends Frontend
{
    public function index(Request $request)
    {
        if ($request->isMethod("post")) {
            foreach ($request->input() as $k => $v)
                $data[$k] = preg_replace('#<script(.*?)>(.*?)</script>#is', '', strip_tags($v));
            $q = User::where('email', '=', $data['email']);
            if ($q->count() > 0) {
                $verify = password_verify($data['password'], $q->first()->password);
                if ($verify) {
                    session(['loggedIn' => "FrontUser"]);
                    $response = ["status" => "success"];
                } else $response = ["status" => "error", "msg" => "Email atau password anda salah"];
            } else $response = ["status" => "error", "msg" => "Email atau password anda salah"];
            echo json_encode($response, JSON_PRETTY_PRINT);
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
            foreach ($request->input() as $k => $v)
                $data[$k] = preg_replace('#<script(.*?)>(.*?)</script>#is', '', strip_tags($v));
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            try {
                $user = new User;
                $user->nama = $data['nama'];
                $user->email = $data['email'];
                $user->telepon = $data['telepon'];
                $user->password = $data['password'];
                $user->save();
                $response = ["status" => "success", "msg" => "Data berhasil disimpan"];
            } catch (\Throwable $th) {
                $response = ["status" => "error", "msg" => "Data gagal disimpan"];
            }
            echo json_encode($response, JSON_PRETTY_PRINT);
        } else {
            $backgroundImage = "hero-bg.jpg";
            return view('user.login.daftar', [
                'backgroundImage' => $backgroundImage
            ]);
        }
    }
}
