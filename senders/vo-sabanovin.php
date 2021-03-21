<?php
function sms_sending($var){
    $apikey = $var['username'];
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.sabanovin.com/v1/$apikey/sms/send.json",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => array(
            'gateway' => $var['form'],
            'to' => $var['to'],
            'text' => $var['msg']
        ),
    ));
    $response = curl_exec($curl);
    $response = json_decode($response);
    curl_close($curl);
    return $response;
}