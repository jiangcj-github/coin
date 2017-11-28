<?php
require_once("../../global/config.php");
require_once("../../global/wallet/btc.php");

//登录检查
session_start();
if(!isset($_SESSION["login"])){
    die_json(["msg"=>"用户未登录"]);
}
$vid=$_SESSION["login"]["id"];
//id
if(!isset($_REQUEST["id"])){
    die_json(["msg"=>"缺少参数"]);
}
$id=$_REQUEST["id"];
//数据库操作
$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
$conn->set_charset("utf8");
//查询挂单
$stmt=$conn->prepare("select num,state from sells where id=? and vid=? and coin='BTC'");
$stmt->bind_param("ii",$id,$vid);
$stmt->execute();
$result=$stmt->get_result();
$data=$result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if(count($data)<=0){
    die_json(["msg"=>"挂单不存在"]);
}
if($data[0]["state"]!=0){
    die_json(["msg"=>"该挂单已被锁定，不可删除"]);
}
$num=$data[0]["num"];
//核对账户
$stmt=$conn->prepare("select btcAddr,btcLock from user_wallets where vid=?");
$stmt->bind_param("i",$vid);
$stmt->execute();
$result=$stmt->get_result();
$wallet=$result->fetch_all(MYSQLI_ASSOC)[0];
$stmt->close();
//btc
$btc=new btc();
$btcNum=$btc->checkAddr($wallet["btcAddr"]);
$btcLock=$wallet["btcLock"];
//核对账户
if($btcLock<0||$btcLock>$btcNum||$btcLock<$num){
    die_json(["msg"=>"账户异常"]);
}
//解锁账户
$stmt=$conn->prepare("update user_wallets set btcLock=btcLock-? where vid=?");
$stmt->bind_param("di",$num,$vid);
$stmt->execute();
$stmt->close();
//删除卖单
$stmt=$conn->prepare("delete from sells where id=? and vid=? and state=0");
$stmt->bind_param("ii",$id,$vid);
$stmt->execute();
$stmt->close();
//
die_json(["ok"=>"ok","data"=>""]);
