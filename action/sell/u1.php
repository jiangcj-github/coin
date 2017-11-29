<?php
require_once("../../global/config.php");
require_once("../../global/wallet/btc.php");

//登录检查
session_start();
if(!isset($_SESSION["login"])){
    die_json(["msg"=>"用户未登录"]);
}
$vid=$_SESSION["login"]["id"];
$nick=$_SESSION["login"]["nick"];
//coin
if(!isset($_REQUEST["coin"])){
    die_json(["msg"=>"缺少参数"]);
}
$coin=$_REQUEST["coin"];
if($coin!="BTC") {
    die_json(["msg" => "暂时不支持此货币"]);
}
//price
if(!isset($_REQUEST["price"])){
    die_json(["msg"=>"缺少参数"]);
}
$price=$_REQUEST["price"];
if(!is_numeric($price)||$price<=0){
    die_json(["msg"=>"价格不正确"]);
}
//num
if(!isset($_REQUEST["num"])){
    die_json(["msg"=>"缺少参数"]);
}
$num=$_REQUEST["num"];
if(!is_numeric($num)||$num<=0){
    die_json(["msg"=>"数量不正确"]);
}
//pay_method
if(!isset($_REQUEST["pay_method"])){
    die_json(["msg"=>"缺少参数"]);
}
$pay_method=$_REQUEST["pay_method"];
if(!preg_match("/^\S+$/",$pay_method) || mb_strlen($pay_method)>15 || mb_strlen($pay_method)<2) {
    die_json(["msg" => "付款方式不合法"]);
}
//remake
if(!isset($_REQUEST["remake"])){
    die_json(["msg"=>"缺少参数"]);
}
$remake=$_REQUEST["remake"];
if(mb_strlen($remake)>100){
    die_json(["msg"=>"备注不超过100个字符"]);
}
//ac_pass
if(!isset($_REQUEST["ac_pass"])){
    die_json(["msg"=>"缺少参数"]);
}
$ac_pass=$_REQUEST["ac_pass"];

//数据库操作
$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
$conn->set_charset("utf8");
//检查是否实名认证，及手机验证
$stmt=$conn->prepare("select phone,idcard,fullname,ac_pass from user_infos where vid=?");
$stmt->bind_param("i",$vid);
$stmt->execute();
$result=$stmt->get_result();
$info=$result->fetch_all(MYSQLI_ASSOC)[0];
$stmt->close();
if(!$info["phone"]){
    die_json(["msg"=>"手机未验证"]);
}else if(!$info["idcard"]||!$info["fullname"]){
    die_json(["msg"=>"未实名认证"]);
}else if(!$info["ac_pass"]){
    die_json(["msg"=>"未设置交易密码"]);
}
//余额是否足够
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
if($btcLock<0||$btcLock>$btcNum){
    die_json(["msg"=>"账户异常"]);
}
if($num>$btcNum-$btcLock){
    die_json(["msg"=>"您的可用货币不足"]);
}
//挂单
$stmt=$conn->prepare("insert into sells(vid,nick,coin,price,pay_method,num,remake,time) values(?,?,?,?,?,?,?,?)");
$time=(new DateTime())->format("Y-m-d H:i:s");
$stmt->bind_param("issdsdss",$vid,$nick,$coin,$price,$pay_method,$num,$remake,$time);
$stmt->execute();
$stmt->close();
//锁定账户
$stmt=$conn->prepare("update user_wallets set btcLock=btcLock+? where vid=?");
$stmt->bind_param("di",$num,$vid);
$stmt->execute();
$stmt->close();
//
die_json(["ok"=>"ok","data"=>""]);
