<?php
    include("../../../../global/checkLogin.php");
    //计数信息完整度
    $fn_per=10;
    if($_SESSION["login"]["age"]){
        $fn_per+=10;
    }
    if($_SESSION["login"]["sex"]){
        $fn_per+=10;
    }
    if($_SESSION["login"]["province"]){
        $fn_per+=10;
    }
    if($_SESSION["login"]["city"]){
        $fn_per+=10;
    }
    if($_SESSION["login"]["qq"]){
        $fn_per+=10;
    }
    if($_SESSION["login"]["wx"]){
        $fn_per+=10;
    }
    if($_SESSION["login"]["phone"]){
        $fn_per+=10;
    }
    if($_SESSION["login"]["idcard"]){
        $fn_per+=10;
    }
    if($_SESSION["login"]["fullname"]){
        $fn_per+=10;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户中心-淘币客</title>
    <link href="/web/layout/img/logo.png" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/web/layout/css/layout.css">
    <link rel="stylesheet" type="text/css" href="/web/userhome/left/css/left.css">
    <link rel="stylesheet" type="text/css" href="/web/userhome/iframe/usered/css/usered.css">
</head>
<body>
    <?php include("../../../layout/top.php") ?>
    <div class="layout">
        <div class="main">
            <?php include("../../left/left.php") ?>
            <div class="right">
                <!--账号信息-->
                <div class="h3">账号信息</div>
                <div class="s1">
                    <div class="c1">
                        <svg viewBox="0 0 90 90" width="90" height="90">
                           <circle r="40" cx="45" cy="45" stroke-dasharray="<?php echo 251*(1-$fn_per/100) ?> 1000"></circle>
                        </svg>
                        <span class="f2"><?php echo $fn_per ?>%</span>
                        <a class="f3" href="u1.php">完善信息</a>
                    </div>
                    <table class="c2">
                        <tr>
                            <td style="width:250px;">邮箱：<?php echo $_SESSION["login"]["email"] ?></td>
                            <td class="img-group x16">
                                <img src="/web/userhome/iframe/usered/img/trade.svg" title="交易数">
                                交易次数：3
                            </td>
                        </tr>
                        <tr>
                            <td style="width:250px;">昵称：<?php echo $_SESSION["login"]["nick"] ?></td>
                            <td>
                                <span class="img-group x16" style="color:#ff9900"><img src="/web/userhome/iframe/usered/img/zan.png" title="好感">(3434)</span>
                                <span class="img-group x16" style="margin-left:10px;color:#ff3300"><img src="/web/userhome/iframe/usered/img/jubao.png" title="举报">(53)</span>
                                <span class="img-group x16" style="margin-left:10px;"><img src="/web/userhome/iframe/usered/img/comment.png" title="评价"><a href="#">(34)</a></span>
                            </td>
                        </tr>
                        <tr>
                            <td>注册时间：<?php echo $_SESSION["login"]["time"] ?></td>
                        </tr>

                    </table>
                </div>
                <!--快速通道-->
                <div class="h3">快速通道</div>
                <div class="s2">
                    <div class="ul">
                        <div class="li">
                            修改密码
                            <span class="f1">修改登录密码，能有效保护您的账户。</span>
                            <a href="/web/userhome/iframe/usered/u2.php">修改</a>
                        </div>
                        <div class="li">
                            手机验证
                            <span class="f1">验证您的手机号码，提高账户安全性。</span>
                            <?php if($_SESSION["login"]["phone"]){ ?>
                                <button href="javascript:void(0);" id="pub" class="pub <?php echo $_SESSION["login"]["ispub2"]?"show":"" ?>"></button>
                                <span class="fgap">|</span>
                                <span class="f2">已认证</span>
                            <?php }else{ ?>
                                <a href="/web/userhome/iframe/usered/u3.php">去验证</a>
                            <?php } ?>
                        </div>
                        <div class="li">
                            实名认证
                            <span class="f1">验证您的身份信息，提高信息完善度。</span>
                            <?php if($_SESSION["login"]["idcard"]&&$_SESSION["login"]["fullname"]){ ?>
                                <span class="f2">已认证</span>
                            <?php }else{ ?>
                                <a href="/web/userhome/iframe/usered/u4.php">立即认证</a>
                            <?php } ?>
                        </div>
                        <div class="li">
                            资金密码
                            <span class="f1">为了您的账户安全，请设置资金密码。</span>
                            <?php if($_SESSION["login"]["ac_pass"]){ ?>
                                <a href="/web/userhome/iframe/usered/u5.php">修改</a>
                            <?php }else{ ?>
                                <a href="/web/userhome/iframe/usered/u5.php">立即设置</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("../../../layout/footer.php") ?>
    </div>
    <script>left.activeItem("usered");</script>
    <script src="/web/userhome/iframe/usered/js/usered.js"></script>
</body>
</html>