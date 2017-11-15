<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>实名认证-淘币客</title>
    <link href="/web/common/img/logo.png" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/web/common/css/layout.css">
    <link rel="stylesheet" type="text/css" href="/web/common/css/userhome/left.css">
    <link rel="stylesheet" type="text/css" href="/web/common/css/userhome/usered.css">
</head>
<body>
<?php include("../../layout/top.php") ?>
<div class="layout">
    <div class="main">
        <?php include("../left.php") ?>
        <div class="right">
            <!--实名认证-->
            <div class="nav">
                <div class="h3">实名认证</div>
                <div class="f1 img-group x16">
                    <img src="/web/common/img/userhome/usered.svg">
                    <a href="/web/iframe_userhome/usered.php">个人中心</a>
                    <span style="margin:0 5px;">&gt;</span>
                    <span style="color:#999;">实名认证</span>
                </div>
            </div>
            <div class="s6">
                <div class="input-group">
                    <label for="fullname">真实姓名：</label>
                    <input type="text" id="fullname">
                </div>
                <div class="input-group">
                    <label for="idcard">身份证号码：</label>
                    <input type="text" id="idcard">
                </div>
                <div class="f1">
                    <button class="btn" id="submit">提交</button>
                </div>
            </div>

        </div>
    </div>
    <?php include("../../layout/footer.php") ?>
</div>
<script>left.activeItem("usered");</script>
<script src="/web/iframe_userhome/js/IdCodeValid.js"></script>
<script src="/web/iframe_userhome/usered/js/u4.js"></script>
</body>
</html>