<?php
require_once("../../global/phpqrcode/phpqrcode.php");

if(!isset($_REQUEST["text"])){
    die();
}
$text=$_REQUEST["text"];
header("Content-Type: image/png");
QRcode::png($text);