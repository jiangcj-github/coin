<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>设置资金密码-淘币客</title>
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
            <!--实名认证-->
            <div class="nav">
                <div class="h3">设置资金密码</div>
                <div class="f1 img-group x16">
                    <img src="/web/userhome/left/img/usered.svg">
                    <a href="/web/userhome/iframe/usered/usered.php">个人中心</a>
                    <span style="margin:0 5px;">&gt;</span>
                    <span style="color:#999;">设置资金密码</span>
                </div>
            </div>
            <div class="s51">
                <div class="input-group">
                    <label for="ac_pass2">资金密码：</label>
                    <input type="text" id="ac_pass2" class="password" tabindex="1">
                    <span class="info">设置您的资金密码，6-15个字符，仅限0-9a-zA-Z._-</span>
                </div>
                <div class="input-group">
                    <label for="ac_pass3">确认资金密码：</label>
                    <input type="text" id="ac_pass3" class="password" tabindex="2">
                    <span class="info">确认您的资金密码</span>
                </div>
                <div class="input-group">
                    <label for="check">手机验证码：</label>
                    <input type="text" id="check" class="addin" tabindex="3">
                    <button class="addon" id="checkBtn">获取验证码</button>
                    <span class="info">验证码仅15分钟内有效，请尽快输入</span>
                </div>
                <div class="f1">
                    <button class="btn" id="submit" tabindex="4">提交</button>
                    <span class="info"> 对资金的所有操作都需要您提供资金密码，请牢记您的资金密码。</span>
                </div>
            </div>

        </div>
    </div>
    <?php include("../../../layout/footer.php") ?>
</div>
<script>left.activeItem("usered");</script>
<script>
    $(".password").focus(function(){
        $(this).prop("type","password");
    });
</script>
<script src="/web/userhome/iframe/usered/js/u5_reset.js"></script>
</body>
</html>