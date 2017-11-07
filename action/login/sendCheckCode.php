<?php
require_once("../../global/global.php");
require_once("../../global/phpmailer/class.phpmailer.php");

//参数检查
if(!isset($_REQUEST["email"])){
    die_json(["msg"=>"缺少参数"]);
}
$addr=$_REQUEST["email"];
if(preg_match("/^[0-9a-zA-Z._-]+@[0-9a-zA-Z._-]+$/",$addr)<=0){
    die_json(["msg"=>"错误的邮箱格式"]);
}
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
if($status){
    die_json(["ok"=>"ok","data"=>["code"=>$code]]);
}
die_json(["msg"=>"验证码发送失败"]);
