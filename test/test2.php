<?php

if(!isset($_REQUEST["text"])){
    die();
}
$text=$_REQUEST["text"];
echo $text;