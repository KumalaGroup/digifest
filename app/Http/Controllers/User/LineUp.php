<?php

namespace App\Http\Controllers\User;

use App\Http\Core\Backend;

class LineUp extends Backend
{
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
        return view('user.lineUp.detail', [
            'sectionTitle' => $detail,
            'backgroundImage' => $backgroundImage,
            'baseImg' => parent::$baseImg,
            'data' => $result
        ]);
    }
    public function interiorExterior($brand, $detail)
    {
        $detail = urldecode($detail);
        $backgroundImage = "hero-bg.jpg";
        $result = get(parent::$urlApi . "digifest_lineUp/{$brand}/" . reformatString($detail) . "/360Img");
        foreach ($result->interior as $v)
            $interior[] = "&quot;$v->gambar&quot;";
        foreach ($result->exterior as $v)
            $exterior[] = "&quot;$v->gambar&quot;";
        $interior = !empty($interior) ? implode(",", $interior) : "";
        $exterior = !empty($exterior) ? implode(",", $exterior) : "";
        return view('user.lineUp.interiorExterior', [
            'sectionTitle' => urldecode($detail),
            'backgroundImage' => $backgroundImage,
            'baseImg' => parent::$baseImg,
            'data' => [
                'interior' => $interior,
                'exterior' => $exterior
            ]
        ]);
    }
    public function testDrive($brand, $detail)
    {
        $detail = urldecode($detail);
        $backgroundImage = "hero-bg.jpg";
        $result = get(parent::$urlApi . "digifest_lineUp/{$brand}/" . reformatString($detail) . "/360Drive");
        return view('user.lineUp.testDrive', [
            'sectionTitle' => urldecode($detail),
            'backgroundImage' => $backgroundImage,
            'data' => $result
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
