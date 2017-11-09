<?php
require_once("../../global/global.php");

//登录检查
session_start();
if(!isset($_SESSION["login"])){
    die_json(["msg"=>"用户未登录"]);
}
$vid=$_SESSION["login"]["id"];

//数据库操作
$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
$conn->set_charset("utf8");

//查询
$stmt=$conn->prepare("select * from msgs where vid=? and state=0");
$stmt->bind_param("i",$vid);
$stmt->execute();
$result=$stmt->get_result();
$data=$result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
die_json(["ok"=>"ok","data"=>$data]);


