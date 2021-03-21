<?php
function sms_sending($var){
    ini_set("soap.wsdl_cache_enabled", "0");
    try {
        $client = new SoapClient('http://api.payamak-panel.com/post/send.asmx?wsdl', array('encoding'=>'UTF-8'));
        $parameters['username'] = $var['username'];
        $parameters['password'] = $var['password'];
        $parameters['from'] = $var['form'];
        $parameters['to'] = $var['to'];
        $parameters['text'] = $var['msg'];
        $parameters['isflash'] = false;
        $parameters['udh'] = "";
        $parameters['recId'] = array(0);
        $parameters['status'] = 0x0;
        $status = $client->SendSms($parameters)->SendSmsResult;
    } catch (SoapFault $ex) {
        $status = $ex->faultstring;
    }
    if($status == '1'){
        $status = 'ارسال شده';
    }
    return $status;
}