<?php
function sms_sending($var){
	$stxtmsg = array(
        "username" => $var['username'],
        "password" => $var['password'],
        "sendernumber" => $var['form'],
        "to" => $var['to'],
        "txt" => $var['msg'],
    );
    return json_encode($stxtmsg);
}