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
    <title>登录-淘币客</title>
    <link href="/web/layout/img/logo.png" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/web/layout/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="/web/main/css/index.css" />
    <link rel="stylesheet" type="text/css" href="/web/login/css/sign.css" />
</head>
<body>
    <?php include("../layout/top.php") ?>
    <div class="layout">
        <div class="main">
            <div class="loginBox">
                <div class="h3">登录</div>
                <input type="email" placeholder="邮箱" class="input text" id="email">
                <input type="password" placeholder="密码" class="input text" id="pass">
                <div class="err"></div>
                <button class="input btn" id="signin">登录</button>
                <div class="link">
                    <a href="/web/login/reset_pass.php">忘记密码？</a>
                    <a href="/web/login/signup.php">免费注册</a>
                </div>
            </div>
        </div>
        <?php include("../layout/footer.php") ?>
    </div>
    <script src="/web/login/js/md5.min.js"></script>
    <script src="/web/login/js/signin.js"></script>
</body>
</html>