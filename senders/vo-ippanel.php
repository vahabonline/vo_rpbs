<?php
function sms_sending($var){
    $url = "https://ippanel.com/services.jspd";
    $param = array(
        'uname' => $var['username'],
        'pass' => $var['password'],
        'from' => $var['form'],
        'message' => $var['msg'],
        'to' => json_encode($var['to']),
        'op' => 'send'
    );
    $handler = curl_init($url);
    curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
    curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
    $response2 = curl_exec($handler);
    $response2 = json_decode($response2);
    $res_code = $response2[0];
    $res_data = $response2[1];
    return $res_data;
}