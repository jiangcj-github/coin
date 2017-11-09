<?php
require_once("../../global/global.php");
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
    <link href="/web/common/img/logo.png" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/web/common/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="/web/common/css/index.css" />
    <link rel="stylesheet" type="text/css" href="/web/common/css/login/sign.css" />
</head>
<body>
    <?php include("../layout/top.php") ?>
    <div class="layout">
        <div class="main">
            <div class="loginBox2">
                <div class="h3">重置密码</div>
                <input type="email" placeholder="注册邮箱" class="input text" id="email">
                <input type="password" placeholder="新密码 (6-15个字符，仅限0-9a-zA-Z._-)" class="input text" id="pass">
                <input type="password" placeholder="确认密码" class="input text" id="pass1">
                <div class="checkcode">
                    <input type="text" placeholder="邮箱验证码" class="input text" id="check">
                    <button class="input btn" id="check_send">获取验证码</button>
                </div>
                <button class="input btn" id="submit">提交</button>
            </div>
        </div>
        <?php include("../layout/footer.php") ?>
    </div>
    <script src="js/reset.js"></script>
</body>
</html>