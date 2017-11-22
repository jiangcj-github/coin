<?php
require_once("../../global/phpqrcode/phpqrcode.php");

if(!isset($_REQUEST["text"])){
    die();
}
$text=$_REQUEST["text"];
QRcode::png($text);