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
