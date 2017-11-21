<?php
require_once("../../global/config.php");
require_once("../../global/AliyunSMS.php");
session_start();

//登录检查
if(!isset($_SESSION["login"])){
    die_json(["msg"=>"用户未登录"]);
}
$vid=$_SESSION["login"]["id"];
//phone
if(!isset($_REQUEST["phone"])){
    die_json(["msg"=>"缺少参数"]);
}
$phone=$_REQUEST["phone"];
if(preg_match("/^1[0-9]{10}$/",$phone)<=0){
    die_json(["msg"=>"手机号码不正确"]);
}

//数据库操作
$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
$conn->set_charset("utf8");
//手机号是否验证
$stmt=$conn->prepare("select vid from user_infos where phone=?");
$stmt->bind_param("s",$phone);
$stmt->execute();
$result=$stmt->get_result();
$data=$result->fetch_all(MYSQLI_ASSOC);
if(count($data)>0){
    die_json(["msg"=>"手机号已验证"]);
}
$stmt->close();
//时间间隔检查
$stmt=$conn->prepare("select sendCode,num from checkCode_strict2 where vid=?");
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
$_SESSION["checkPhone"]=$phone.$code;
//写入发送状态
$stmt=$conn->prepare("insert into checkCode_strict2(vid,sendCode,num) values(?,?,0) ON DUPLICATE KEY update sendCode=?,num=(num+1)%3");
$stri_time=(new DateTime())->format("Y-m-d H:i:s");
$stmt->bind_param("iss",$vid,$stri_time,$stri_time);
$stmt->execute();
$stmt->close();
//
die_json(["ok"=>"ok","data"=>""]);

