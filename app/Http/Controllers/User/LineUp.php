<?php

namespace App\Http\Controllers\User;

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
        $result = get(parent::$urlApi . "digifest_lineUp/{$brand}");
        return view('user.lineUp.index', [
            'sectionTitle' => $sectionTitle,
            'backgroundImage' => $backgroundImage,
            'baseImg' => parent::$baseImg,
            'data' => $result
        ]);
    }
    public function detail($brand, $detail)
    {
        $detail = urldecode($detail);
        $backgroundImage = "hero-bg.jpg";
        $result = get(parent::$urlApi . "digifest_lineUp/{$brand}/" . reformatString($detail));
        // debug($result);
        return view('user.lineUp.detail', [
            'sectionTitle' => $detail,
            'backgroundImage' => $backgroundImage,
            'baseImg' => parent::$baseImg,
            'data' => $result
        ]);
    }
    public function interiorExterior($brand, $detail)
    {
        $backgroundImage = "hero-bg.jpg";
        return view('user.lineUp.interiorExterior', [
            'sectionTitle' => urldecode($detail),
            'backgroundImage' => $backgroundImage
        ]);
    }
    public function testDrive($brand, $detail)
    {
        $backgroundImage = "hero-bg.jpg";
        return view('user.lineUp.testDrive', [
            'sectionTitle' => urldecode($detail),
            'backgroundImage' => $backgroundImage
        ]);
    }
    public function penawaran($brand, $detail)
    {
        $backgroundImage = "hero-bg.jpg";
        return view('user.lineUp.penawaran', [
            'sectionTitle' => urldecode($detail),
            'backgroundImage' => $backgroundImage
        ]);
    }
}
