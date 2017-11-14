<?php
require_once("../../global/global.php");
session_start();

//登录检查
if(!isset($_SESSION["login"])){
    die_json(["msg"=>"用户未登录"]);
}
$vid=$_SESSION["login"]["id"];
//phone
if(!isset($_REQUEST["phone"])){
    die_json(["msg"=>"缺少参数"]);
}
$phone=$_REQUEST["phone"];
if(preg_match("/^1[0-9]{10}$/",$phone)<=0){
    die_json(["msg"=>"手机号码不正确"]);
}
//code
if(!isset($_REQUEST["code"])){
    die_json(["msg"=>"缺少参数"]);
}
$code=$_REQUEST["code"];
if(!isset($_SESSION["checkPhone"])||$phone.$code!=$_SESSION["checkPhone"]){
    die_json(["msg"=>"验证码错误"]);
}

//数据库操作
$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
$conn->set_charset("utf8");
//手机号是否验证
$stmt=$conn->prepare("select vid from user_infos where phone=?");
$stmt->bind_param("s",$phone);
$stmt->execute();
$result=$stmt->get_result();
$data=$result->fetch_all(MYSQLI_ASSOC);
if(count($data)>0){
    die_json(["msg"=>"手机号已验证"]);
}
$stmt->close();
//更新手机号
$stmt=$conn->prepare("update user_infos set phone=? where vid=?");
$stmt->bind_param("si",$phone,$vid);
$stmt->execute();
$stmt->close();
die_json(["ok"=>"ok","data"=>""]);
