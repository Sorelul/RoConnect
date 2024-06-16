<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Europe/Bucharest');



if (!function_exists('cauta_cui')) {
    function cauta_cui($cui)
    {
        $anafURL = "https://webservicesp.anaf.ro/PlatitorTvaRest/api/v8/ws/tva";
        $header = ["Content-Type: application/json"];
        $postfields[] = ['cui' => $cui, 'data' => date('Y-m-d')];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (compatible; MSIE 7.01; Windows NT 5.0)");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 130);
        curl_setopt($ch, CURLOPT_TIMEOUT, 130);
        curl_setopt($ch, CURLOPT_URL, $anafURL);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postfields));
        $result = curl_exec($ch);
        $data = json_decode($result);
        if (isset($data) && isset($data->found) && isset($data->found[0])) {
            if (count($data->found) <= 0)
                return $data;
            else
                return $data->found[0];
            return $data;
        } else {
            return null;
        }
    }
}
