<?php
require_once("../../global/global.php");
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
//登录确认
$stmt=$conn->prepare("select * from users where email=? and md5(password)=?");
$stmt->bind_param("ss",$email,$pass);
$stmt->execute();
$result=$stmt->get_result();
$data=$result->fetch_all(MYSQLI_ASSOC);
if(count($data)<=0){
    die_json(["msg"=>"邮箱或密码不正确"]);
}
$stmt->close();
//
$_SESSION["login"]=$data;
die_json(["ok"=>"ok","data"=>""]);

