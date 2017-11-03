<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location:/web/login/login.php");
    die();
}