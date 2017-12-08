<?php
require_once("../../global/config.php");
require_once("../../global/phpmailer/class.phpmailer.php");
session_start();

//参数检查
if(!isset($_REQUEST["email"])){
    die_json(["msg"=>"缺少参数"]);
}
$addr=$_REQUEST["email"];
if(preg_match("/^[0-9a-zA-Z._-]+@[0-9a-zA-Z._-]+$/",$addr)<=0){
    die_json(["msg"=>"错误的邮箱格式"]);
}
//数据库操作
$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
$conn->set_charset("utf8");
//邮箱是否注册
$stmt=$conn->prepare("select id from users where email=?");
$stmt->bind_param("s",$email);
$stmt->execute();
$result=$stmt->get_result();
$data=$result->fetch_all(MYSQLI_ASSOC);
if(count($data)>0){
    die_json(["msg"=>"邮箱已注册"]);
}
$stmt->close();
//时间间隔检查
$stmt=$conn->prepare("select sendCode from checkCode_strict where email=?");
$stmt->bind_param("s",$addr);
$stmt->execute();
$stmt->bind_result($stri_sec);
if($stmt->fetch() && $stri_sec){
    $cur_sec=(new DateTime())->getTimestamp();
    $stri_sec=DateTime::createFromFormat("Y-m-d H:i:s",$stri_sec)->getTimestamp();
    if($cur_sec-$stri_sec<60){
        die_json(["msg"=>"操作太频繁了，需等待".(60-$cur_sec+$stri_sec)."秒"]);
    }
}
$stmt->close();
//生成邮箱验证码
$code="";
for ($i=0;$i<6;$i++ ){
    $code.=mt_rand(0,9);
}
//发送邮件
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Host = "smtp.sina.com";
$mail->Port = 25;
$mail->CharSet = "UTF-8";
$mail->FromName = "淘币客";
$mail->Username = "taobike_site@sina.com";
$mail->Password = "20090928";
$mail->From = "taobike_site@sina.com";
$mail->isHTML(true);
$mail->addAddress($addr);
$mail->Subject = "邮箱验证";
$mail->Body = "<p>本次登录的验证码是:&nbsp;".$code."</p><p>为了确保您的帐号安全，该验证码仅1小时内使用有效，请勿直接回复该邮件。</p>";
$status = $mail->send();
//記錄操作時間
$stmt=$conn->prepare("insert into checkCode_strict(email,sendCode) values(?,?) ON DUPLICATE KEY update sendCode=?");
$stri_time=(new DateTime())->format("Y-m-d H:i:s");
$stmt->bind_param("sss",$addr,$stri_time,$stri_time);
$stmt->execute();
$stmt->close();
//
$_SESSION["checkCode"]=$addr.$code;
die_json(["ok"=>"ok"]);


