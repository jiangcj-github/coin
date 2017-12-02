<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>手机验证-淘币客</title>
    <link href="/web/layout/img/logo.png" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/web/layout/css/layout.css">
    <link rel="stylesheet" type="text/css" href="/web/userhome/left/css/left.css">
    <link rel="stylesheet" type="text/css" href="/web/userhome/iframe/usered/css/usered.css">
</head>
<body>
<?php include("../../../layout/top.php") ?>
<div class="layout">
    <div class="main u">
        <?php include("../../left/left.php") ?>
        <div class="right">
            <!--手机验证-->
            <div class="nav">
                <div class="h3">手机验证</div>
                <div class="f1 img-group x16">
                    <img src="/web/userhome/left/img/usered.svg">
                    <a href="/web/userhome/iframe/usered/usered.php">个人中心</a>
                    <span style="margin:0 5px;">&gt;</span>
                    <span style="color:#999;">手机验证</span>
                </div>
            </div>
            <div class="s5">
                <?php if($_SESSION["login"]["phone"]){ ?>
                    <div class="finish">
                        <img src="/web/userhome/iframe/usered/img/finish.svg">
                        <span>您已验证手机号&nbsp;<b><?php echo substr($_SESSION["login"]["phone"],0,3)."****".substr($_SESSION["login"]["phone"],-4) ?></b></span>
                    </div>
                <?php } ?>
                <div class="input-group">
                    <label for="phone">手机号码：</label>
                    <input type="text" id="phone">
                    <span class="info">输入您的手机号码</span>
                </div>
                <div class="input-group check">
                    <label for="check">验证码：</label>
                    <input type="text" id="check">
                    <button id="check_send">发送验证码</button>
                    <span class="info">验证码15分钟内有效，请尽快输入</span>
                </div>
                <div class="check-group">
                    <label>
                        <input type="checkbox" id="ispub2" <?php if($_SESSION["login"]["ispub2"]) echo "checked=\"checked\""; ?>>
                        <span>是否公开您的手机号码</span>
                    </label>
                    <span class="info">如果您选中此项，其他人在交易时可以看到您的手机号码。</span>
                </div>
                <div class="f1">
                    <button class="btn" id="submit">提交</button>
                </div>
            </div>
        </div>
    </div>
    <?php include("../../../layout/footer.php") ?>
</div>
<script>left.activeItem("usered");</script>
<script src="/web/userhome/iframe/usered/js/u3.js"></script>
</body>
</html>