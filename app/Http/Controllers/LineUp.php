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
        $backgroundImage = "hero-bg.jpg";
        return view('pages.lineUp.detail', [
            'sectionTitle' => $detail,
            'backgroundImage' => $backgroundImage
        ]);
    }
    public function interiorExterior($brand, $detail)
    {
        $backgroundImage = "hero-bg.jpg";
        return view('pages.lineUp.interiorExterior', [
            'sectionTitle' => $detail,
            'backgroundImage' => $backgroundImage
        ]);
    }
    public function testDrive($brand, $detail)
    {
        $backgroundImage = "hero-bg.jpg";
        return view('pages.lineUp.testDrive', [
            'sectionTitle' => $detail,
            'backgroundImage' => $backgroundImage
        ]);
    }
    public function penawaran($brand, $detail)
    {
        $backgroundImage = "hero-bg.jpg";
        return view('pages.lineUp.penawaran', [
            'sectionTitle' => $detail,
            'backgroundImage' => $backgroundImage
        ]);
    }
}
