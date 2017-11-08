<?php
require_once("../../global/global.php");
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
if(!isset($_REQUEST["nick"])){
    die_json(["msg"=>"缺少参数"]);
}
$nick=$_REQUEST["nick"];
if(preg_match("/^\S{3,15}$/",$nick)<=0){
    die_json(["msg"=>"昵称不符合规范"]);
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
if(count($data)>0){
    die_json(["msg"=>"邮箱已注册"]);
}
$stmt->close();
//昵称是否注册
$stmt=$conn->prepare("select id from users where nick=?");
$stmt->bind_param("s",$nick);
$stmt->execute();
$result=$stmt->get_result();
$data=$result->fetch_all(MYSQLI_ASSOC);
if(count($data)>0){
    die_json(["msg"=>"昵称已注册"]);
}
$stmt->close();
//插入记录
$stmt=$conn->prepare("insert into users(nick,email,password,time) values(?,?,?,?)");
$time=(new DateTime())->format("Y-m-d H:i:s");
$stmt->bind_param("ssss",$nick,$email,$pass,$time);
$stmt->execute();
$stmt->close();
//
die_json(["ok"=>"ok","data"=>""]);
