<?php
require_once("../../global/config.php");

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
//删除广告
$stmt=$conn->prepare("delete from ads where id=? and vid=?");
$stmt->bind_param("ii",$id,$vid);
$stmt->execute();
$stmt->close();
//
die_json(["ok"=>"ok","data"=>""]);
