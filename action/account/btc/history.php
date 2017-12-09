<?php
require_once("../../../global/config.php");

//登录检查
session_start();
if(!isset($_SESSION["login"])){
    die_json(["msg"=>"用户未登录"]);
}
$vid=$_SESSION["login"]["id"];
//数据库操作
$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
$conn->set_charset("utf8");
//获取转入转出记录
$stmt=$conn->prepare("select coin,type,num,time from wallet_historys where vid=?");
$stmt->bind_param("i",$vid);
$stmt->execute();
$resutl=$stmt->get_result();
$history=$resutl->fetch_all(MYSQLI_ASSOC);
$stmt->close();
//
die_json(["ok"=>"ok","data"=>$history]);