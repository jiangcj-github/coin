<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户主页-淘币客</title>
    <link href="/web/common/img/logo.png" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/web/common/css/layout.css">
    <link rel="stylesheet" type="text/css" href="/web/common/css/userhome/left.css">
    <link rel="stylesheet" type="text/css" href="/web/common/css/userhome/home.css">
</head>
<body>
    <?php include("../layout/top.php") ?>
    <div class="layout">
        <div class="main">
            <?php include("left.php") ?>
            <div class="right">
                <!--账号信息-->
                <div class="h3">账号信息</div>
                <div class="s1">
                    <div class="c1">
                        <svg viewBox="0 0 90 90" width="90" height="90">
                           <circle r="40" cx="45" cy="45" stroke-dasharray="<?php echo 314*(1-0.7) ?> 1000"></circle>
                        </svg>
                        <span class="f2">90%</span>
                        <a class="f3" href="#">完善信息</a>
                    </div>
                    <table class="c2">
                        <tr>
                            <td>邮箱：398017990@qq.com</td>
                            <td style="margin-left:20px;">
                                <span class="img-group x20" style="color:#ff9900"><img src="/web/common/img/userhome/usered/zan.png" title="好感">(3434)</span>
                                <span class="img-group x20" style="margin-left:10px;color:#ff3300"><img src="/web/common/img/userhome/usered/jubao.png" title="举报">(53)</span>
                            </td>
                        </tr>
                        <tr>
                            <td>昵称：林打开</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                会员等级：0 (还有3天过期)
                                <a href="#" style="margin-left:10px;color:red;" class="img-group x26">
                                    <img src="/web/common/img/userhome/usered/vip_gift.png" style="margin-right:-1px;">升级会员</a>
                            </td>
                    </table>
                </div>
                <!--快速通道-->
                <div class="h3">快速通道</div>
                <div class="s2">
                    <div class="ul">
                        <div class="li">修改密码</div>
                        <div class="li">绑定手机</div>
                        <div class="li"></div>
                        <div class="li"></div>
                    </div>
                </div>

            </div>
        </div>
        <?php include("../layout/footer.php") ?>
    </div>
    <script>left.activeItem("usered");</script>
</body>
</html>