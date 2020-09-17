<?php

namespace App\Http\Controllers\Admin;

use App\Http\Core\Backend;
use Illuminate\Http\Request;

class Home extends Backend
{
    public function __construct()
    {
        parent::_cekSession("isAdmin");
    }
    public function index()
    {
        return view('admin.pages.home');
    }
}
