<?php
require_once("../../global/config.php");
require_once("../../global/sms/AliyunSMS.php");

//登录检查
session_start();
if(!isset($_SESSION["login"])){
    die_json(["msg"=>"用户未登录"]);
}
$vid=$_SESSION["login"]["id"];
//phone
if(!$_SESSION["login"]["phone"]){
    die_json(["未验证手机"]);
}
$phone=$_SESSION["login"]["phone"];
//数据库操作
$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
$conn->set_charset("utf8");
//时间间隔检查
$stmt=$conn->prepare("select sendCode,num from checkCode_strict4 where vid=?");
$stmt->bind_param("i",$vid);
$stmt->execute();
$stmt->bind_result($stri_sec,$num);
if($stmt->fetch()&& $stri_sec){
    $cur_sec=(new DateTime())->getTimestamp();
    $stri_sec=DateTime::createFromFormat("Y-m-d H:i:s",$stri_sec)->getTimestamp();
    if($num<2&&$cur_sec-$stri_sec<120){
        die_json(["msg"=>"操作太频繁了，需等待".(120-$cur_sec+$stri_sec)."秒"]);
    }else if($num>=2&&$cur_sec-$stri_sec<60*60*24){
        die_json(["msg"=>"发送达到今日上限，需等待".round((60*60*24-$cur_sec+$stri_sec)/3600)."小时"]);
    }
}
$stmt->close();
//发送
$code="";
for ($i=0;$i<6;$i++ ){
    $code.=mt_rand(0,9);
}
$sendResult=AliyunSMS($phone,$code);
if($sendResult!="OK"){
    die_json(["msg"=>"发送失败"]);
}
$_SESSION["checkPhone5"]=$code;
//写入发送状态
$stmt=$conn->prepare("insert into checkCode_strict4(vid,sendCode,num) values(?,?,0) ON DUPLICATE KEY update sendCode=?,num=(num+1)%3");
$stri_time=(new DateTime())->format("Y-m-d H:i:s");
$stmt->bind_param("iss",$vid,$stri_time,$stri_time);
$stmt->execute();
$stmt->close();
//
die_json(["ok"=>"ok","data"=>""]);

