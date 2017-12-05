<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改登录密码-淘币客</title>
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
            <!--修改登录密码-->
            <div class="nav">
                <div class="h3">修改登录密码</div>
                <div class="f1 img-group x16">
                    <img src="/web/userhome/left/img/usered.svg">
                    <a href="/web/userhome/iframe/usered/usered.php">个人中心</a>
                    <span style="margin:0 5px;">&gt;</span>
                    <span style="color:#999;">修改密码</span>
                </div>
            </div>
            <div class="s4">
                <div class="input-group">
                    <label for="pass1">当前密码：</label>
                    <input type="text" id="pass1" class="password">
                    <span class="info">您当前的登录密码</span>
                </div>
                <div class="input-group">
                    <label for="pass">新密码：</label>
                    <input type="text" id="pass2" class="password">
                    <span class="info">输入新密码，6-15个字符，不能包含除0-9a-zA-Z._-之外的符号</span>
                </div>
                <div class="input-group">
                    <label for="pass3">确认新密码：</label>
                    <input type="text" id="pass3" class="password">
                    <span class="info">确认您的新密码</span>
                </div>
                <div class="f1">
                    <button class="btn" id="submit">保存</button>
                </div>
            </div>

        </div>
    </div>
    <?php include("../../../layout/footer.php") ?>
</div>
<script>left.activeItem("usered");</script>
<script src="/web/userhome/iframe/usered/js/u2.js"></script>
<script>
    $(".password").focus(function(){
        $(this).prop("type","password");
    });
</script>
</body>
</html>