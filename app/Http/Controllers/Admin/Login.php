<?php

namespace App\Http\Controllers\Admin;

use App\Http\Core\Frontend;
use Illuminate\Http\Request;

class Login extends Frontend
{
    public function __construct()
    {
        parent::_cekSession("isAdmin");
    }
    public function index()
    {
        return view('admin.login');
    }
}
