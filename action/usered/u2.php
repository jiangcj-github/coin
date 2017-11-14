<?php
require_once("../../global/global.php");

//登录检查
session_start();
if(!isset($_SESSION["login"])){
    die_json(["msg"=>"用户未登录"]);
}
$vid=$_SESSION["login"]["id"];
//pass1(原密码)
if(!isset($_REQUEST["pass1"])){
    die_json(["msg"=>"缺少参数"]);
}
$pass1=$_REQUEST["pass1"];
//pass2(新密码)
if(!isset($_REQUEST["pass2"])){
    die_json(["msg"=>"缺少参数"]);
}
$pass2=$_REQUEST["pass2"];
if(preg_match("/^[0-9a-zA-Z._-]{6,15}$/",$pass2)<=0){
    die_json(["msg"=>"新密码不符合规范"]);
}
//数据库操作
$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
$conn->set_charset("utf8");
//检查密码是否正确
$stmt=$conn->prepare("select id from users where id=? and password=?");
$stmt->bind_param("is",$vid,$pass1);
$stmt->execute();
$resutl=$stmt->get_result();
$data=$resutl->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if(count($data)<=0){
    die_json(["msg"=>"密码不正确"]);
}
//更新密码
$stmt=$conn->prepare("update users set password=? where id=?");
$stmt->bind_param("si",$pass1,$vid);
$stmt->execute();
$stmt->close();
die_json(["ok"=>"ok","data"=>""]);
