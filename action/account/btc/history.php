<?php
require_once("../../../global/config.php");
require_once("../../../global/wallet/btc.php");

//登录检查
session_start();
if(!isset($_SESSION["login"])){
    die_json(["msg"=>"用户未登录"]);
}
$vid=$_SESSION["login"]["id"];
//数据库操作
$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
$conn->set_charset("utf8");
//获取钱包地址
$stmt=$conn->prepare("select btcAddr from user_wallets_btc where vid=?");
$stmt->bind_param("i",$vid);
$stmt->execute();
$resutl=$stmt->get_result();
$wallet=$resutl->fetch_all(MYSQLI_ASSOC)[0];
$stmt->close();
//
$history=[];
//btc交易记录
$btcAddr=$wallet["btcAddr"];
$req=file_get_contents("https://blockchain.info/rawaddr/$btcAddr");
if(!$req) die(["msg"=>"查询失败"]);
$bd=json_decode($req);
foreach($bd->txs as $v){
    foreach($v->inputs as $v1){
        if($v1->prev_out->addr==$btcAddr){
            $hash=$v->hash;
            $coin="btc";
            $type="转出";
            $value=$v1->prev_out->value*0.00000001;
            $time=date("Y-m-d H:i:s",$v->time);
            array_push($history,["hash"=>$hash,"coin"=>$coin,"type"=>$type,"value"=>$value,"time"=>$time]);
            goto stop;
        }
    }
    foreach($v->out as $v1){
        $item=[];
        if($v1->addr==$btcAddr){
            $hash=$v->hash;
            $coin="btc";
            $type="转入";
            $value=$v1->value*0.00000001;
            $time=date("Y-m-d H:i:s",$v->time);
            array_push($history,["hash"=>$hash,"coin"=>$coin,"type"=>$type,"value"=>$value,"time"=>$time]);
            goto stop;
        }
    }
    stop:
}
//
die_json(["ok"=>"ok","data"=>$history]);