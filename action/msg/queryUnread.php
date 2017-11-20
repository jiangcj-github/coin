<?php
require_once("../../global/global.php");
require_once("../../global/TimeUtil.php");

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
$stmt=$conn->prepare("select title,time from msgs where vid=? and state=0 order by time desc");
$stmt->bind_param("i",$vid);
$stmt->execute();
$result=$stmt->get_result();
$data=$result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
foreach($data as $key=>$value){
    $data[$key]["time"]=time_tran($data[$key]["time"]);
}
//
die_json(["ok"=>"ok","data"=>$data]);


