<?php
require_once("../../../../global/config.php");
require_once("../../../../global/TimeUtil.php");
include("../../../../global/checkLogin.php");

$vid=$_SESSION["login"]["id"];
//数据库操作
$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
$conn->set_charset("utf8");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>转出BTC-淘币客</title>
    <link href="/web/layout/img/logo.png" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/web/layout/css/layout.css">
    <link rel="stylesheet" type="text/css" href="/web/userhome/left/css/left.css">
    <link rel="stylesheet" type="text/css" href="/web/userhome/iframe/account/css/account.css">
</head>
<body>
<?php include("../../../layout/top.php") ?>
<div class="layout">
    <div class="main">
        <?php include("../../left/left.php") ?>
        <div class="right">
            <div class="nav">
                <div class="h3">转出BTC</div>
                <div class="f1 img-group x16">
                    <img src="/web/userhome/left/img/account.svg">
                    <a href="/web/userhome/iframe/account/account.php">我的账户</a>
                    <span style="margin:0 5px;">&gt;</span>
                    <span style="color:#999;">转出BTC</span>
                </div>
            </div>
            <div class="s2">
                <div class="f1">
                    <img src="/web/userhome/iframe/account/img/btc.png">
                    <span class="coin">BTC</span>
                </div>
                <div class="f2">
                    <span class="label">总共</span><span class="ct">0</span>
                </div>
                <div class="f2">
                    <span class="label">锁定</span><span class="ct">0.5</span>
                </div>
                <div class="f2">
                    <span class="label">可用</span><span class="ct">0.6</span>
                </div>
            </div>
            <div class="s3">
                <div>
                    <label for="addr">转出至：</label>
                    <input type="text" id="addr">
                </div>
                <div>
                    <label for="num">数量：</label>
                    <input type="text" id="num"><a href="#">全部</a>
                </div>
                <div>
                    <label for="num">交易密码：</label>
                    <input type="text" id="num"><a href="#">全部</a>
                </div>
                <div>
                    <label for="num">手机验证码：</label>
                    <input type="text" id="num"><a href="#">全部</a>
                </div>
                <div>
                    <input type="checkbox">
                    <span>我已仔细阅读并同意转出协议,并确认转出</span>
                </div>
                <button id="submit">确认转出</button>
            </div>
            <div class="s22">
                <div class="para">转出说明</div>
                <div class="para">1.&nbsp;您必须先<a href="/web/userhome/iframe/usered/u3.php">验证手机</a>，并且完成<a href="/web/userhome/iframe/usered/u4.php">实名认证</a>，才能进行该操作。</div>
                <div class="para">2.&nbsp;货币的转出是自动的，实际入账时间取决于区块链网络的确认速度。<a href="#">详细</a></div>
                <div class="para">3.&nbsp;货币的转出是免费的，我们不会收取任何手续费。</div>
            </div>
        </div>
    </div>
    <?php include("../../../layout/footer.php") ?>
</div>
<script>left.activeItem("account");</script>
</body>
</html>