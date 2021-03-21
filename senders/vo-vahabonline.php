<?php
function sms_sending($var){
    $post = [
        'email' => $var['username'],
        'token' => $var['password'],
        'form' => $var['form'],
        'to' => $var['to'],
        'text' => $var['msg'],
    ];
    $ch = curl_init('http://api.vols.ir/sms/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $response = curl_exec($ch);
    curl_close($ch);
	$json = json_decode($response);
	if($json->status == 'Ok'){
        return 'Send - '.$json->sendcode;
    }else{
        return $response;
    }
}