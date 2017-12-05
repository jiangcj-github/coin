<?php
require_once("../../global/config.php");
require_once("../../global/TimeUtil.php");
//数据库连接
$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
$conn->set_charset("utf8");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>重置密码-淘币客</title>
    <link href="/web/layout/img/logo.png" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/web/layout/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="/web/main/css/index.css" />
    <link rel="stylesheet" type="text/css" href="/web/login/css/sign.css" />
</head>
<body>
    <?php include("../layout/top.php") ?>
    <div class="layout">
        <div class="main">
            <div class="loginBox2">
                <div class="h3">重置密码</div>
                <input type="email" placeholder="注册邮箱" class="input text" id="email" tabindex="1">
                <input type="password" placeholder="新密码 (6-15个字符，仅限0-9a-zA-Z._-)" class="input text" id="pass" tabindex="2">
                <input type="password" placeholder="确认密码" class="input text" id="pass1" tabindex="3">
                <div class="checkcode">
                    <input type="text" placeholder="邮箱验证码" class="input text" id="check" tabindex="4">
                    <button class="input btn" id="check_send">获取验证码</button>
                </div>
                <button class="input btn" id="submit" tabindex="5">提交</button>
            </div>
        </div>
        <?php include("../layout/footer.php") ?>
    </div>
    <script src="/web/login/js/reset.js"></script>
</body>
</html>