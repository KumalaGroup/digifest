<?php

namespace App\Http\Controllers;

use App\Http\Core\Backend;
use Illuminate\Http\Request;

class LineUp extends Backend
{
    public function __construct()
    {
        parent::__construct();
        parent::_cekRoute();
    }
    public function index($brand)
    {
        $sectionTitle = "Line Up " . ucwords($brand);
        $backgroundImage = "hero-bg.jpg";
        return view('pages.lineUp.index', [
            'sectionTitle' => $sectionTitle,
            'backgroundImage' => $backgroundImage
        ]);
    }
    public function detail($brand, $detail)
    {
        // $sectionTitle = "Line Up " . ucwords(request()->segment(1));
        $backgroundImage = "hero-bg.jpg";
        return view('pages.lineUp.detail', [
            'sectionTitle' => $detail,
            'backgroundImage' => $backgroundImage
        ]);
    }
}
