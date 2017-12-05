<?php
require_once("../../global/config.php");

//登录检查
session_start();
if(!isset($_SESSION["login"])){
    die_json(["msg"=>"用户未登录"]);
}
$vid=$_SESSION["login"]["id"];
//ids
if(!isset($_REQUEST["ids"])){
    die_json(["msg"=>"缺少参数"]);
}
$ids=explode(",",$_REQUEST["ids"]);
//数据库操作
$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
$conn->set_charset("utf8");
//删除
foreach($ids as $key=>$value){
    $stmt=$conn->prepare("delete from msgs where id=? and vid=?");
    $stmt->bind_param("ii",$value,$vid);
    $stmt->execute();
    $stmt->close();
}
die_json(["ok"=>"ok","data"=>""]);


