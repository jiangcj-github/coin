<?php
require_once("../../../global/config.php");
require_once("../../../global/wallet/btc.php");

//登录检查
session_start();
if(!isset($_SESSION["login"])){
    die_json(["msg"=>"用户未登录"]);
}
$vid=$_SESSION["login"]["id"];
//btc
$btc=new btc();
$btcAddr=$_SESSION["login"]["btcAddr"];
$btcNum=$btc->checkAddr($btcAddr);
$btcLock=$_SESSION["login"]["btcLock"];
//
die_json(["ok"=>"ok","data"=>[
    "btcAddr"=>$btcAddr,
    "btcNum"=>$btcNum,
    "btcLock"=>$btcLock,
    "btcAvail"=>$btcNum-$btcLock]
]);
