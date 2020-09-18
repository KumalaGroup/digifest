<?php

namespace App\Http\Controllers\Admin;

use App\Http\Core\Frontend;
use App\Models\UserAdmin;
use Closure;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

use function GuzzleHttp\json_encode;

class Login extends Frontend
{
    public function __construct()
    {
        $this->middleware(function ($request, Closure $next) {
            parent::_cekSession("isAdmin");
            return $next($request);
        });
    }
    public function index(Request $request)
    {
        if ($request->isMethod("post")) {
            foreach ($request->input() as $k => $v)
                $data[$k] = preg_replace('#<script(.*?)>(.*?)</script>#is', '', strip_tags($v));
            $q = UserAdmin::where('username', '=', $data['username']);
            if ($q->count() > 0) {
                $verify = password_verify($data['password'], $q->first()->password);
                if ($verify) {
                    session(['loggedIn' => "BackAdmin"]);
                    $response = ["status" => "success"];
                } else $response = ["status" => "error", "msg" => "Username atau password anda salah"];
            } else $response = ["status" => "error", "msg" => "Username atau password anda salah"];
            return json_encode($response, JSON_PRETTY_PRINT);
        } else {
            return view('admin.login');
        }
    }
}
