<?php
require_once("../../global/global.php");

/**
 *  成功返回:{ok:"ok",data:data}
 *  错误返回:{msg:msg_text}
 *  异常:其他
 */

//参数检查
if(!isset($_REQUEST["vid"])){
    die_json(["msg"=>"缺少参数"]);
}
$vid=$_REQUEST["vid"];
//数据库操作
$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
$conn->set_charset("utf8");
//查询
$stmt=$conn->prepare("select count(*) as count from msgs where vid=? and state=0");
$stmt->bind_param("i",$vid);
$stmt->execute();
$result=$stmt->get_result();
$data=$result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
die_json(["ok"=>"ok","data"=>["msgNum"=>$data[0]->count]]);


