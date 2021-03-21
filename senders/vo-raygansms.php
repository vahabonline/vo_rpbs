<?php
function sms_sending($vars){
	$client = new nusoap_client('http://smspanel.trez.ir/trezsmswebservice.asmx?WSDL', true);
    $UserMessageId = rand(100,1000);
	$Class = '1';
	$parameters = array(
		'Username' => $vars['username'],
		'Passwod' => $vars['password'],
		'SenderNumebr' => $vars['form'],
		'MessageBody' => $vars['msg'],
		'ReciptionNumbers' => $vars['to'],
		'Class' => $Class,
		'UserMessageId' => $UserMessageId
	);
	$result = $client->call('SendOneMessage', $parameters);
	return 	$result['SendOneMessageResult'];
}
