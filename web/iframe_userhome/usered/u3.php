<?php
require_once("../../../global/global.php");
include("../../../global/checkLogin.php");

$vid=$_SESSION["login"]["id"];
//数据库操作
$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
$conn->set_charset("utf8");
//查询infos
$stmt=$conn->prepare("select phone from user_infos where vid=?");
$stmt->bind_param("i",$vid);
$stmt->execute();
$result=$stmt->get_result();
$infos=$result->fetch_all(MYSQLI_ASSOC)[0];
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>手机验证-淘币客</title>
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
            <!--手机验证-->
            <div class="nav">
                <div class="h3">手机验证</div>
                <div class="f1 img-group x16">
                    <img src="/web/common/img/userhome/left/usered.svg">
                    <a href="/web/iframe_userhome/usered.php">个人中心</a>
                    <span style="margin:0 5px;">&gt;</span>
                    <span style="color:#999;">手机验证</span>
                </div>
            </div>
            <div class="s5">
                <?php if($infos["phone"]){ ?>
                    <div class="input-group">
                        <label for="phone">手机号码：</label>
                        <span><?php echo $infos["phone"] ?></span>
                    </div>
                    <div class="f1">
                        <span>手机验证已完成</span>
                    </div>
                <?php }else{ ?>
                    <div class="input-group">
                        <label for="phone">手机号码：</label>
                        <input type="text" id="phone">
                    </div>
                    <div class="input-group check">
                        <label for="check">验证码：</label>
                        <input type="text" id="check">
                        <button id="check_send">发送验证码</button>
                    </div>
                    <div class="f1">
                        <button class="btn" id="submit">提交</button>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php include("../../layout/footer.php") ?>
</div>
<script>left.activeItem("usered");</script>
<script src="/web/iframe_userhome/usered/js/u3.js"></script>
</body>
</html>