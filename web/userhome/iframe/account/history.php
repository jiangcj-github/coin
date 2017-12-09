<?php
    require_once("../../../../global/config.php");
    include("../../../../global/checkLogin.php");

    $vid=$_SESSION["login"]["id"];
    //数据库操作
    $conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
    $conn->set_charset("utf8");
    //查询sells
    $stmt=$conn->prepare("select coin,type,num,time from wallet_historys where vid=? order by time desc");
    $stmt->bind_param("i",$vid);
    $stmt->execute();
    $result=$stmt->get_result();
    $historys=$result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>账户记录-淘币客</title>
    <link href="/web/layout/img/logo.png" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/web/layout/css/layout.css">
    <link rel="stylesheet" type="text/css" href="/web/userhome/left/css/left.css">
    <link rel="stylesheet" type="text/css" href="/web/userhome/iframe/account/css/account.css">
</head>
<body>
    <?php include("../../../layout/top.php") ?>
    <div class="layout">
        <div class="main u">
            <?php include("../../left/left.php") ?>
            <div class="right">
                <div class="nav">
                    <div class="h3">账户记录</div>
                    <div class="f1 img-group x16">
                        <img src="/web/userhome/left/img/account.svg">
                        <a href="/web/userhome/iframe/account/account.php">我的账户</a>
                        <span style="margin:0 5px;">&gt;</span>
                        <span style="color:#999;">账户记录</span>
                    </div>
                </div>
                <div class="s4" id="his">
                    <div class="li-head">
                        <div class="time">时间</div>
                        <div class="coin">货币</div>
                        <div class="type">类型</div>
                        <div class="value">数量</div>
                    </div>
                    <?php foreach($historys as $v){ ?>
                        <div class="li">
                            <div class="time"><?php echo $v["time"] ?></div>
                            <div class="coin"><?php echo $v["coin"] ?></div>
                            <div class="type"><?php echo $v["type"]?"转入":"转出" ?></div>
                            <div class="value"><?php echo $v["num"] ?></div>
                        </div>
                    <?php } ?>
                    <?php if(count($historys)<=0){ ?>
                        <div class="no-record">暂无记录</div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php include("../../../layout/footer.php") ?>
    </div>
    <script>left.activeItem("account");</script>
</body>
</html>