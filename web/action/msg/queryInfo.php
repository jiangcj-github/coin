<?php
require_once("../../../global/global.php");

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
die_json(["ok"=>"ok","data"=>["msgNum"=>2,"noticeNum"=>4]]);


