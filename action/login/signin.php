<?php
require_once("../../global/config.php");
session_start();

//参数检查
if(!isset($_REQUEST["email"])){
    die_json(["msg"=>"缺少参数"]);
}
$email=$_REQUEST["email"];
if(!isset($_REQUEST["pass"])){
    die_json(["msg"=>"缺少参数"]);
}
$pass=$_REQUEST["pass"];
//數據庫操作
$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
$conn->set_charset("utf8");
//查询users
$stmt=$conn->prepare("select id,nick,email,time from users where email=? and md5(password)=?");
$stmt->bind_param("ss",$email,$pass);
$stmt->execute();
$result=$stmt->get_result();
$login=$result->fetch_all(MYSQLI_ASSOC)[0];
if(count($login)<=0){
    die_json(["msg"=>"邮箱或密码不正确"]);
}
$stmt->close();
$vid=$login["id"];
//查询user_infos
$stmt=$conn->prepare("select sex,age,province,city,qq,wx,phone,idcard,fullname,ac_pass,ispub,ispub2 from user_infos where vid=?");
$stmt->bind_param("i",$vid);
$stmt->execute();
$result=$stmt->get_result();
$data=$result->fetch_all(MYSQLI_ASSOC)[0];
$stmt->close();
$login=array_merge($login,$data);
//查询user_walltes_btc
$stmt=$conn->prepare("select xpub,btcAddr from user_wallets_btc where vid=?");
$stmt->bind_param("i",$vid);
$stmt->execute();
$result=$stmt->get_result();
$data=$result->fetch_all(MYSQLI_ASSOC)[0];
$stmt->close();
$login=array_merge($login,$data);
//
$_SESSION["login"]=$login;
die_json(["ok"=>"ok","data"=>""]);

