<?php
    require_once("../../global/global.php");
    require_once("../../global/TimeUtil.php");
    include("../../global/checkLogin.php");

    $vid=$_SESSION["login"]["id"];
    //数据库操作
    $conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
    $conn->set_charset("utf8");
    //查询ads
    $stmt=$conn->prepare("select id,flag,coin,price,method,minNum,maxNum,time from ads where vid=?");
    $stmt->bind_param("i",$vid);
    $stmt->execute();
    $result=$stmt->get_result();
    $ads=$result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>消息-淘币客</title>
    <link href="/web/common/img/logo.png" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/web/common/css/layout.css">
    <link rel="stylesheet" type="text/css" href="/web/common/css/userhome/left.css">
    <link rel="stylesheet" type="text/css" href="/web/common/css/userhome/msg.css">
</head>
<body>
    <?php include("../layout/top.php") ?>
    <div class="layout">
        <div class="main">
            <?php include("left.php") ?>
            <div class="right">
                <div class="h3">所有消息</div>
                <div class="s1">
                    <div class="li unread new">
                        <div class="title">标题<span class="time">3天前</span></div>
                        <div class="ct">和问号的作用差不多，用于设置"贪婪模式"。</div>
                    </div>
                    <div class="li unread">
                        <div class="title">标题<span class="time">3天前</span></div>
                        <div class="ct">和问号的作用差不多，用于设置"贪婪模式"。</div>
                    </div>
                    <div class="li">
                        <div class="title">标题<span class="time">3天前</span></div>
                        <div class="ct">和问号的作用差不多，用于设置"贪婪模式"。</div>
                    </div>
                    <div class="li">
                        <div class="title">标题<span class="time">3天前</span></div>
                        <div class="ct">和问号的作用差不多，用于设置"贪婪模式"。</div>
                    </div>
                    <div class="li">
                        <div class="title">标题<span class="time">3天前</span></div>
                        <div class="ct">和问号的作用差不多，用于设置"贪婪模式"。</div>
                    </div>
                    <div class="li">
                        <div class="title">标题<span class="time">3天前</span></div>
                        <div class="ct">和问号的作用差不多，用于设置"贪婪模式"。</div>
                    </div>
                    <div class="li">
                        <div class="title">标题<span class="time">3天前</span></div>
                        <div class="ct">和问号的作用差不多，用于设置"贪婪模式"。</div>
                    </div>
                    <div class="li">
                        <div class="title">标题<span class="time">3天前</span></div>
                        <div class="ct">和问号的作用差不多，用于设置"贪婪模式"。</div>
                    </div>
                    <div class="li">
                        <div class="title">标题<span class="time">3天前</span></div>
                        <div class="ct">和问号的作用差不多，用于设置"贪婪模式"。</div>
                    </div>
                    <div class="li">
                        <div class="title">标题<span class="time">3天前</span></div>
                        <div class="ct">和问号的作用差不多，用于设置"贪婪模式"。</div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("../layout/footer.php") ?>
    </div>
    <script>left.activeItem("msg");</script>
</body>
</html>