<?php
    require_once("../../../../global/config.php");
    include("../../../../global/checkLogin.php");

    $vid=$_SESSION["login"]["id"];
    //数据库操作
    $conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
    $conn->set_charset("utf8");
    //查询infos
    $stmt=$conn->prepare("select * from user_infos where vid=?");
    $stmt->bind_param("i",$vid);
    $stmt->execute();
    $result=$stmt->get_result();
    $data=$result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    $user_infos=$data[0];
    //查询users
    $stmt=$conn->prepare("select id,nick,email,time from users where id=?");
    $stmt->bind_param("i",$vid);
    $stmt->execute();
    $result=$stmt->get_result();
    $data=$result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    $users=$data[0];
    //计数信息完整度
    $fn_per=10;
    if($user_infos["age"]!=null){
        $fn_per+=10;
    }
    if($user_infos["sex"]!=null){
        $fn_per+=10;
    }
    if($user_infos["province"]!=null){
        $fn_per+=10;
    }
    if($user_infos["city"]!=null){
        $fn_per+=10;
    }
    if($user_infos["qq"]!=null){
        $fn_per+=10;
    }
    if($user_infos["wx"]!=null){
        $fn_per+=10;
    }
    if($user_infos["phone"]!=null){
        $fn_per+=10;
    }
    if($user_infos["idcard"]!=null){
        $fn_per+=10;
    }
    if($user_infos["fullname"]!=null){
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
                            <td>邮箱：<?php echo $users["email"] ?></td>
                            <td style="margin-left:20px;">
                                <span class="img-group x16" style="color:#ff9900"><img src="/web/userhome/iframe/usered/img/zan.png" title="好感">(3434)</span>
                                <span class="img-group x16" style="margin-left:10px;color:#ff3300"><img src="/web/userhome/iframe/usered/img/jubao.png" title="举报">(53)</span>
                                <span class="img-group x16" style="margin-left:10px;"><img src="/web/userhome/iframe/usered/img/comment.png" title="评价"><a href="#">(34)</a></span>
                            </td>
                        </tr>
                        <tr>
                            <td>昵称：<?php echo $users["nick"] ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                会员等级：<?php echo $user_infos["vip"] ?>
                                <a href="#" style="margin-left:10px;color:red;" class="img-group x26">
                                    <img src="/web/userhome/iframe/usered/img/vip_gift.png" style="margin-right:-1px;">升级会员</a>
                            </td>
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
                            邮箱验证
                            <span class="f1">验证您的邮箱，提高信息完善度。</span>
                            <span class="f2">已验证</span>
                        </div>
                        <div class="li">
                            手机验证
                            <span class="f1">验证您的手机号码，提高信息完善度。</span>
                            <?php if($user_infos["phone"]==null){ ?>
                                <a href="/web/userhome/iframe/usered/u3.php">去验证</a>
                            <?php }else{ ?>
                                <span class="f2">已验证</span>
                            <?php } ?>
                        </div>
                        <div class="li">
                            实名认证
                            <span class="f1">验证您的身份信息，进行实名认证会提高您的信誉等级。</span>
                            <?php if($user_infos["idcard"]==null){ ?>
                                <a href="/web/userhome/iframe/usered/u4.php">立即认证</a>
                            <?php }else{ ?>
                                <span class="f2">已认证</span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("../../../layout/footer.php") ?>
    </div>
    <script>left.activeItem("usered");</script>
</body>
</html>