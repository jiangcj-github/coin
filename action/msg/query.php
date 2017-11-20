<?php
require_once("../../global/global.php");
require_once("../../global/TimeUtil.php");

//登录检查
session_start();
if(!isset($_SESSION["login"])){
    die_json(["msg"=>"用户未登录"]);
}
$vid=$_SESSION["login"]["id"];
//offset
if(!isset($_REQUEST["offset"])){
    die_json(["msg"=>"缺少参数"]);
}
$offset=$_REQUEST["offset"];
//数据库操作
$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
$conn->set_charset("utf8");

//查询
$stmt=$conn->prepare("select id,title,content,time,state from msgs where vid=? limit 10 offset ? order by time desc");
$stmt->bind_param("ii",$vid,$offset);
$stmt->execute();
$result=$stmt->get_result();
$data=$result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
foreach($data as $key=>$value){
    $data[$key]["time"]=time_tran($data[$key]["time"]);
    $stmt=$conn->prepare("update msgs set state=2 where vid=? and id=?");
    $stmt->bind_param("ii",$vid,$data[$key]["id"]);
    $stmt->execute();
    $stmt->close();
}
//
die_json(["ok"=>"ok","data"=>$data]);


