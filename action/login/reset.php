<?php
require_once("../../global/config.php");
session_start();

//参数检查
if(!isset($_REQUEST["email"])){
    die_json(["msg"=>"缺少参数"]);
}
$email=$_REQUEST["email"];
if(preg_match("/^[0-9a-zA-Z._-]+@[0-9a-zA-Z._-]+$/",$email)<=0){
    die_json(["msg"=>"错误的邮箱格式"]);
}
//
if(!isset($_REQUEST["pass"])){
    die_json(["msg"=>"缺少参数"]);
}
$pass=$_REQUEST["pass"];
if(preg_match("/^[0-9a-zA-Z._-]{6,15}$/",$pass)<=0){
    die_json(["msg"=>"密码不符合规范"]);
}
//
//***********可能存在暴力破解****************//
if(!isset($_REQUEST["check"])){
    die_json(["msg"=>"缺少参数"]);
}
$check=$_REQUEST["check"];
if(!isset($_SESSION["checkCode"])||$email.$check!=$_SESSION["checkCode"]){
    die_json(["msg"=>"验证码错误"]);
}

//數據庫操作
$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
$conn->set_charset("utf8");
//邮箱是否注册
$stmt=$conn->prepare("select id from users where email=?");
$stmt->bind_param("s",$email);
$stmt->execute();
$result=$stmt->get_result();
$data=$result->fetch_all(MYSQLI_ASSOC);
if(count($data)<=0){
    die_json(["msg"=>"邮箱未注册"]);
}
$stmt->close();
//插入记录
$stmt=$conn->prepare("update users set password=? where email=?");
$stmt->bind_param("ss",$pass,$email);
$stmt->execute();
$stmt->close();
//
die_json(["ok"=>"ok","data"=>""]);
