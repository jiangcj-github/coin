<?php
require_once("../../global/config.php");
require_once("../../global/wallet/btc.php");

//登录检查
session_start();
if(!isset($_SESSION["login"])){
    die_json(["msg"=>"用户未登录"]);
}
$vid=$_SESSION["login"]["id"];
//数据库操作
$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
$conn->set_charset("utf8");
//查询账户信息
$stmt=$conn->prepare("select * from user_wallets where vid=?");
$stmt->bind_param("i",$vid);
$stmt->execute();
$result=$stmt->get_result();
$wallet=$result->fetch_all(MYSQLI_ASSOC)[0];
$stmt->close();
//btc
$btc=new btc();
$btcNum=$btc->checkAddr($wallet["btcAddr"]);
$btcLock=$wallet["btcLock"];
//
die_json(["ok"=>"ok","data"=>[
    "btcNum"=>$btcNum,
    "btcLock"=>$btcLock
]]);
