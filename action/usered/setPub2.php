<?php
require_once("../../global/config.php");

//登录检查
session_start();
if(!isset($_SESSION["login"])){
    die_json(["msg"=>"用户未登录"]);
}
$vid=$_SESSION["login"]["id"];
//ispub2
if(!isset($_REQUEST["ispub2"])){
    die_json(["msg"=>"缺少参数"]);
}
$ispub2=$_REQUEST["ispub2"];
if($ispub2!=0&&$ispub2!=1){
    die_json(["msg"=>"参数不正确"]);
}
//数据库操作
$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
$conn->set_charset("utf8");
//更新记录
$stmt=$conn->prepare("update user_infos set ispub2=? where vid=?");
$stmt->bind_param("ii",$ispub2,$vid);
$stmt->execute();
$stmt->close();
//更新session
$_SESSION["login"]["ispub2"]=$ispub2;
//结束
die_json(["ok"=>"ok","data"=>""]);
