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
    <title>注册-淘币客</title>
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
                <div class="h3">注册</div>
                <input type="email" placeholder="邮箱" class="input text" id="email" tabindex="1">
                <input type="text" placeholder="昵称 (3-15个字符，不包含空字符)" class="input text" id="nick" tabindex="2">
                <div class="checkcode">
                    <input type="text" placeholder="邮箱验证码" class="input text" id="check" tabindex="3">
                    <button class="input btn" id="checkBtn">获取验证码</button>
                </div>
                <input type="password" placeholder="密码 (6-15个字符，仅限0-9a-zA-Z._-)" class="input text" id="pass" tabindex="4">
                <input type="password" placeholder="确认密码" class="input text" id="pass1" tabindex="5">
                <button class="input btn" id="sendBtn" tabindex="6">注册</button>
                <div class="link">
                    <label><input type="checkbox" id="protocol">我已阅读并同意<a href="#">《用户协议》</a></label>
                    <span>已有账号？<a href="/web/login/signin.php">立即登陆</a></span>
                </div>
            </div>
        </div>
        <?php include("../layout/footer.php") ?>
    </div>
    <script src="/web/login/js/signup.js"></script>
</body>
</html>