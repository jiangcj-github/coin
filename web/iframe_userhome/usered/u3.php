<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>手机验证-淘币客</title>
    <link href="/web/common/img/logo.png" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/web/common/css/layout.css">
    <link rel="stylesheet" type="text/css" href="/web/common/css/userhome/left.css">
    <link rel="stylesheet" type="text/css" href="/web/common/css/userhome/home.css">
</head>
<body>
<?php include("../../layout/top.php") ?>
<div class="layout">
    <div class="main">
        <?php include("../left.php") ?>
        <div class="right">
            <!--手机验证-->
            <div class="nav">
                <div class="h3">手机验证</div>
                <div class="f1 img-group x16">
                    <img src="/web/common/img/userhome/usered.svg">
                    <a href="/web/iframe_userhome/usered.php">个人中心</a>
                    <span style="margin:0 5px;">&gt;</span>
                    <span style="color:#999;">手机验证</span>
                </div>
            </div>
            <div class="s5">
                <div class="input-group">
                    <label for="pass">手机号码：</label>
                    <input type="text" id="pass">
                </div>
                <div class="input-group check">
                    <label for="pass">验证码：</label>
                    <input type="text" id="pass">
                    <a href="#">发送验证码</a>
                </div>
                <div class="f1">
                    <button class="btn">提交</button>
                </div>
            </div>

        </div>
    </div>
    <?php include("../../layout/footer.php") ?>
</div>
<script>left.activeItem("usered");</script>
<script src="/web/iframe_userhome/js/usered.js"></script>
</body>
</html>