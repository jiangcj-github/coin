<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>实名认证-淘币客</title>
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
                <div class="h3">实名认证</div>
                <div class="f1 img-group x16">
                    <img src="/web/userhome/left/img/usered.svg">
                    <a href="/web/userhome/iframe/usered/usered.php">个人中心</a>
                    <span style="margin:0 5px;">&gt;</span>
                    <span style="color:#999;">实名认证</span>
                </div>
            </div>
            <div class="s6">
                <?php if($_SESSION["login"]["fullname"]&&$_SESSION["login"]["idcard"]){ ?>
                    <div class="finish">
                        <img src="/web/userhome/iframe/usered/img/finish.svg">
                        <span>您已完成实名认证&nbsp;<b><?php echo $_SESSION["login"]["idcard"] ?></b></span>
                    </div>
                <?php }else{ ?>
                    <div class="input-group">
                        <label for="fullname">真实姓名：</label>
                        <input type="text" id="fullname">
                        <span class="info">输入您的真实姓名</span>
                    </div>
                    <div class="input-group">
                        <label for="idcard">身份证号码：</label>
                        <input type="text" id="idcard">
                        <span class="info">输入您的身份证号</span>
                    </div>
                    <div class="f1">
                        <button class="btn" id="submit">提交</button>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
    <?php include("../../../layout/footer.php") ?>
</div>
<script>left.activeItem("usered");</script>
<script src="/web/userhome/iframe/usered/js/IdCodeValid.js"></script>
<script src="/web/userhome/iframe/usered/js/u4.js"></script>
</body>
</html>