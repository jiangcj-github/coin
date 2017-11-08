<?php
session_start();
unset($_SESSION["login"]);
header("Location:/web/index.php");