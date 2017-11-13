<?php

function AliyunSMS($phone,$code){
    date_default_timezone_set("GMT");
    //云平台
    $accessKeyId="LTAIp9Mr9aQLvoZP ";
    $AccessKeySecret="9VdoPAJMJJmI6pmFtvyx9Okfsi0Xl7";
    // 1. 系统参数
    $paras["SignatureMethod"]="HMAC-SHA1";
    $paras["SignatureNonce"]=uniqid();
    $paras["AccessKeyId"]=$accessKeyId;
    $paras["SignatureVersion"]="1.0";
    $paras["Timestamp"]=(new DateTime())->format("Y-m-d\TH:i:s\Z");
    $paras["Format"]="JSON";
    // 2. 业务API参数
    $paras["Action"]="SendSms";
    $paras["Version"]="2017-05-25";
    $paras["RegionId"]="cn-hangzhou";
    $paras["PhoneNumbers"]=$phone;
    $paras["SignName"]="淘币客";
    $paras["TemplateParam"]="{\"code\":\"".$code."\"}";
    $paras["TemplateCode"]="SMS_109500450";
    $paras["OutId"]="123";
    ksort($paras);
    $paras_str="";
    foreach($paras as $key=>$value) {
        $paras_str.="&".rawurlencode($key)."=".rawurlencode($value);
    }
    $paras_str=substr($paras_str,1);
    $signature=rawurlencode(base64_encode(hash_hmac("sha1","GET&%2F&".rawurlencode($paras_str),$AccessKeySecret."&",true)));
    $url="http://dysmsapi.aliyuncs.com/?Signature=".$signature."&".$paras_str;
    //
    $smsResult=json_decode(file_get_contents($url));
    return $smsResult->Coke;
}
