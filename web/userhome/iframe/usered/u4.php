<?php
require_once("../../../../global/config.php");
include("../../../../global/checkLogin.php");

$vid=$_SESSION["login"]["id"];
//数据库操作
$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
$conn->set_charset("utf8");
//查询infos
$stmt=$conn->prepare("select idcard,fullname from user_infos where vid=?");
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
    <title>实名认证-淘币客</title>
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
                <?php if($infos["idcard"] && $infos["fullname"]){ ?>
                    <div class="input-group">
                        <label for="fullname">真实姓名：</label>
                        <span><?php echo $infos["fullname"] ?></span>
                    </div>
                    <div class="input-group">
                        <label for="idcard">身份证号码：</label>
                        <span><?php echo $infos["idcard"] ?></span>
                    </div>
                    <div class="f1">
                        <span>实名认证已完成</span>
                    </div>
                <?php }else{ ?>
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