<?php


$key="123";
$addr="";
$callback="";

$url = "https://api.blockchain.info/v2/receive/balance_update";
$headers=["Content-Type: text/plain"];
$post_data = ["key"=>$key,"addr"=>$addr,"callback"=>urlencode($callback),"onNotification"=>"KEEP","op"=>"RECEIVE"];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$post_data);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$output = curl_exec($ch);
curl_close($ch);
if(!$output){
    die_json(["msg"=>"账户创建失败"]);
}