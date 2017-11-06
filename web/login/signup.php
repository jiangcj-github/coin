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
    <title>coin</title>
    <link rel="stylesheet" type="text/css" href="/web/common/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="/web/common/css/index.css" />
    <link rel="stylesheet" type="text/css" href="/web/common/css/login/sign.css" />
</head>
<body>
    <?php include("../layout/top.php") ?>
    <div class="layout">
        <div class="main">
            <div class="loginBox2">
                <div class="h3">注册</div>
                <input type="email" placeholder="邮箱" class="input text" id="email">
                <div class="err" id="email_err"></div>
                <input type="text" placeholder="昵称" class="input text" id="nick">
                <div class="err" id="nick_err"></div>
                <div class="checkcode">
                    <input type="email" placeholder="邮箱验证码" class="input text" id="check">
                    <button class="input btn" id="check_send">获取验证码</button>
                </div>
                <div class="err" id="check_err"></div>
                <input type="password" placeholder="密码" class="input text" id="pass">
                <div class="err" id="pass_err"></div>
                <input type="password" placeholder="确认密码" class="input text" id="pass1">
                <div class="err" id="pass1_err"></div>
                <button class="input btn" id="signup">注册</button>
                <div class="link">
                    <label><input type="checkbox" id="protocol">我已阅读并同意<a href="#">《用户协议》</a></label>
                    <span>已有账号？<a href="/web/login/signin.php">立即登陆</a></span>
                </div>
            </div>
        </div>
        <?php include("../layout/footer.php") ?>
    </div>
    <script src="signup.js"></script>
</body>
</html>