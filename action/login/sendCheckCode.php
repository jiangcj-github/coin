<?php
include("phpmailer/class.phpmailer.php");

$mail=new PHPMailer(true);



$mail= new PHPMailer();
$mail->IsSMTP();
$mail->Host="smtp.gmail.com";
$mail->Port=465;
$mail->SMTPAuth=true;
$mail->SMTPSecure="ssl";
$mail->Username= "398017990";
$mail->Password = "20090928jcj.";

$mail->From="398017990@qq.com";

$mail->Subject = "标题";
$mail->isHTML(true);
$mail->Body = "<b>1212</b>";
$mail->AltBody = "1212";


$mail->AddAddress("coolbeangoo@gmail.com");


if(!$mail->Send()) {
    echo "Mailer Error: ". $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
?>