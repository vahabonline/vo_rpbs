<?php
// ارسال عادی
function sms_sending($var){
	$curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://panel.asanak.com/webservice/v1rest/sendsms",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => array(
            'username' => $var['username'],
            'password' => $var['password'],
            'Source' => $var['form'],
            'Message' => $var['msg'],
            'destination' => $var['to']
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
	return $response;
}