<?php
require_once("../../../global/config.php");

$url = "https://blockchain.info/ticker";
$req=file_get_contents($url);
if(!$req){
    die_json(["msg"=>"查询失败"]);
}
$data=json_decode($req);
die_json(["ok"=>"ok","data"=>$data]);