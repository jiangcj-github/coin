<?php
isset($_SESSION) or session_start();
if(!isset($_SESSION["login"])){
    header("Location:/web/login/signin.php");
    die();
}