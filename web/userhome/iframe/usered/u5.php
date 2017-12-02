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
                <?php if($_SESSION["login"]["ac_pass"]){ ?>
                    <div class="input-group">
                        <label for="ac_pass1">资金密码：</label>
                        <input type="text" id="ac_pass1" class="password">
                        <span class="info">输入您的真实姓名</span>
                    </div>
                    <div class="input-group">
                        <label for="ac_pass1">资金密码：</label>
                        <input type="text" id="ac_pass1" class="password">
                        <span class="info">输入您的真实姓名</span>
                    </div>
                    <div class="input-group">
                        <label for="ac_pass2">确认资金密码：</label>
                        <input type="text" id="ac_pass2" class="password">
                        <span class="info">输入您的身份证号</span>
                    </div>
                    <div class="input-group">
                        <label for="check">手机验证码：</label>
                        <input type="text" id="check" class="addin"><button class="addon" id="checkBtn">获取验证码</button>
                        <span class="info">发送后15分钟内有效，请尽快输入</span>
                    </div>
                <?php }else{ ?>
                    <div class="input-group">
                        <label for="ac_pass1">资金密码：</label>
                        <input type="text" id="ac_pass1" class="password">
                        <span class="info">输入您的真实姓名</span>
                    </div>
                    <div class="input-group">
                        <label for="ac_pass2">确认资金密码：</label>
                        <input type="text" id="ac_pass2" class="password">
                        <span class="info">输入您的身份证号</span>
                    </div>
                <?php } ?>
                <div class="f1">
                    <button class="btn" id="submit">提交</button>
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
<script src="/web/userhome/iframe/usered/js/IdCodeValid.js"></script>
<script src="/web/userhome/iframe/usered/js/u4.js"></script>
</body>
</html>