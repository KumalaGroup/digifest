<?php

use GuzzleHttp\Client;

use function GuzzleHttp\json_decode;

function curl_post($url, $data)
{
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $r = curl_exec($curl);
    curl_close($curl);
    return $r;
}

function curl_get($url)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $r = curl_exec($curl);
    curl_close($curl);
    return $r;
}
function debug()
{
    $numArgs = func_num_args();
    echo 'Total Arguments:' . $numArgs . "\n";
    $args = func_get_args();
    echo '<pre>';
    foreach ($args as $index => $arg) {
        echo 'Argument ke-' . $index . ':' . "\n";
        var_dump($arg);
        echo "\n";
        unset($args[$index]);
    }
    echo '</pre>';
    die();
}

function post($url, $data)
{
    $request = new Client();
    try {
        $result = json_decode($request->post($url, ['form_params' => $data])->getBody());
        return $result;
    } catch (\Throwable $th) {
        return null;
    }
}
function get($url)
{
    $request = new Client();
    try {
        $result = json_decode($request->get($url)->getBody());
        return $result;
    } catch (\Throwable $th) {
        return null;
    }
}
function reformatString($data)
{
    $judul = strpos($data, ",") ? str_replace(",", " ", $data) : $data;
    $judul = strpos($judul, "(") ? str_replace("(", " ", $judul) : $judul;
    $judul = strpos($judul, ")") ? str_replace(")", " ", $judul) : $judul;
    $judul = strpos($judul, "?") ? str_replace("?", " ", $judul) : $judul;
    $judul = strpos($judul, "!") ? str_replace("!", " ", $judul) : $judul;
    $judul = strpos($judul, "/") ? str_replace("/", " ", $judul) : $judul;
    return str_replace(" ", "_", $judul);
}
function tgl_sql($date)
{
    $exp = explode('-', $date);
    if (count($exp) == 3) {
        $date = $exp[2] . '-' . $exp[1] . '-' . $exp[0];
    }
    return $date;
}
function formatHariTanggal($waktu)
{
    $hari_array = array(
        'Minggu',
        'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu'
    );
    $hr = date('w', strtotime($waktu));
    $hari = $hari_array[$hr];
    $tanggal = date('j', strtotime($waktu));
    $bulan_array = array(
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    );
    $bl = date('n', strtotime($waktu));
    $bulan = $bulan_array[$bl];
    $tahun = date('Y', strtotime($waktu));
    $jam = date('H:i', strtotime($waktu));

    //untuk menampilkan hari, tanggal bulan tahun jam
    //return "$hari, $tanggal $bulan $tahun $jam";

    //untuk menampilkan hari, tanggal bulan tahun
    return [
        'tanggal' => "$hari, $tanggal $bulan $tahun",
        'waktu' => $jam
    ];
}

function generateKode($length = null)
{
    $token = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $token = substr(str_shuffle($token), 0, $length ?? 10);
    return $token;
}

function formatRupiah($value)
{
    return number_format($value, 2, ",", ".");
}
function formatAngka($value)
{
    return implode("", explode(".", $value));
}
