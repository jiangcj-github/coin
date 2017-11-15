<?php
require_once("../../global/global.php");
require_once ("../../global/checkIdcard.php");

//登录检查
session_start();
if(!isset($_SESSION["login"])){
    die_json(["msg"=>"用户未登录"]);
}
$vid=$_SESSION["login"]["id"];
//fullname
if(!isset($_REQUEST["fullname"])){
    die_json(["msg"=>"缺少参数"]);
}
$fullname=$_REQUEST["fullname"];
if(!preg_match("/^[\x{4e00}-\x{9fa5}A-Za-z]+$/u",$fullname)){
    die_json(["msg"=>"姓名不正确"]);
}
//idcard
if(!isset($_REQUEST["idcard"])){
    die_json(["msg"=>"缺少参数"]);
}
$idcard=$_REQUEST["idcard"];
if(!checkIdentity($idcard)){
    die_json(["msg"=>"身份证号码验证不通过"]);
}
//数据库操作
$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
$conn->set_charset("utf8");
//不允许重复验证
$stmt=$conn->prepare("select vid from user_infos where idcard is not null and fullname is not null and vid=?");
$stmt->bind_param("i",$vid);
$stmt->execute();
$result=$stmt->get_result();
$data=$result->fetch_all(MYSQLI_ASSOC);
if(count($data)>0){
    die_json(["msg"=>"不允许重复验证"]);
}
$stmt->close();
//更新实名信息
$stmt=$conn->prepare("update user_infos set fullname=?,idcard=? where vid=?");
$stmt->bind_param("ssi",$fullname,$idcard,$vid);
$stmt->execute();
$stmt->close();
die_json(["ok"=>"ok","data"=>""]);
