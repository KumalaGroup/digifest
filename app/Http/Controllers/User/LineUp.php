<?php

namespace App\Http\Controllers\User;

use App\Http\Core\Backend;
use Illuminate\Http\Request;

class LineUp extends Backend
{
    public function index($brand)
    {
        $sectionTitle = "Line Up " . ucwords($brand);
        $result = get(parent::$urlApi . "digifest_lineUp/{$brand}");
        return view('user.lineUp.index', [
            'sectionTitle' => $sectionTitle,
            'backgroundImage' => $this->background,
            'baseImg' => parent::$baseImg,
            'data' => $result
        ]);
    }
    public function detail($brand, $detail, Request $request)
    {
        if ($request->isMethod("post")) {
            foreach ($request->all() as $k => $v)
                $data[$k] = preg_replace('#<script(.*?)>(.*?)</script>#is', '', strip_tags($v));
            $data['customer'] = $request->session()->get('id');
            $result = post(parent::$urlApi . "digifest_cart", $data);
            return response()->json($result);
        } else {
            $detail = urldecode($detail);

            $result = get(parent::$urlApi . "digifest_lineUp/{$brand}/" . reformatString($detail));
            return view('user.lineUp.detail', [
                'sectionTitle' => $detail,
                'backgroundImage' => $this->background,
                'baseImg' => parent::$baseImg,
                'data' => $result
            ]);
        }
    }
    public function interiorExterior($brand, $detail)
    {
        $detail = urldecode($detail);
        $result = get(parent::$urlApi . "digifest_lineUp/{$brand}/" . reformatString($detail) . "/360Img");
        foreach ($result->interior as $v)
            $interior[] = "&quot;$v->gambar&quot;";
        foreach ($result->exterior as $v)
            $exterior[] = "&quot;$v->gambar&quot;";
        $interior = !empty($interior) ? implode(",", $interior) : "";
        $exterior = !empty($exterior) ? implode(",", $exterior) : "";
        return view('user.lineUp.interiorExterior', [
            'sectionTitle' => urldecode($detail),
            'backgroundImage' => $this->background,
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
        $result = get(parent::$urlApi . "digifest_lineUp/{$brand}/" . reformatString($detail) . "/360Drive");
        return view('user.lineUp.testDrive', [
            'sectionTitle' => urldecode($detail),
            'backgroundImage' => $this->background,
            'data' => $result
        ]);
    }
}
