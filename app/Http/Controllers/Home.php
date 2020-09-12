<?php

namespace App\Http\Controllers;

use App\Http\Core\Backend;
use Illuminate\Http\Request;

class Home extends Backend
{
    public function __construct()
    {
        parent::__construct();
        parent::_cekRoute();
    }
    public function index()
    {
        $backgroundImage = "hero-bg.jpg";
        return view('pages.home', [
            'backgroundImage' => $backgroundImage
        ]);
    }
    public function mainStage($brand)
    {
        $sectionTitle = ucwords($brand) . " Virtual Fair";
        $backgroundImage = "hero-bg.jpg";
        return view('pages.mainStage', [
            'sectionTitle' => $sectionTitle,
            'backgroundImage' => $backgroundImage
        ]);
    }
    public function rundown($brand)
    {
        $sectionTitle = ucwords($brand) . " Virtual Fair";
        $backgroundImage = "hero-bg.jpg";
        return view('pages.rundown', [
            'sectionTitle' => $sectionTitle,
            'backgroundImage' => $backgroundImage
        ]);
    }
}
