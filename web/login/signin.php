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
        <div class="loginBox">
            <div class="h3">登录</div>
            <input type="email" placeholder="邮箱" class="input text">
            <input type="password" placeholder="密码" class="input text">
            <div class="err">用户名不存在</div>
            <button class="input btn">登录</button>
            <div class="link">
                <a href="#">忘记密码？</a>
                <a href="/web/login/signup.php">免费注册</a>
            </div>
        </div>
    </div>
    <?php include("../layout/footer.php") ?>
</div>
</body>
</html>