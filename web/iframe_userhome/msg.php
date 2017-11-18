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
                    <div class="head">
                        <a href="javascript:void(0);" id="selectAll">选择全部</a>
                        <a href="javascript:void(0);" id="remove">删除</a>
                        <span>选中<span id="checkNum" style="margin:0 2px;">0</span>项</span>
                    </div>
                    <div class="li unread"  data-id="1">
                        <div class="d1"></div>
                        <div class="d2">
                            <div class="title">标题<span class="time">3天前</span></div>
                            <div class="ct">和问号的作用差不多，用于设置"贪婪模式"。问号的作用差<a href="#">升级会员</a>吧。</div>
                        </div>
                    </div>
                    <div class="li unread"  data-id="2">
                        <div class="d1"></div>
                        <div class="d2">
                            <div class="title">标题<span class="time">3天前</span></div>
                            <div class="ct">和问号的作用差不多，用于设置"贪婪模式"。问号的作用差<a href="#">升级会员</a>吧。</div>
                        </div>
                    </div>
                    <div class="li unread"  data-id="3">
                        <div class="d1"></div>
                        <div class="d2">
                            <div class="title">标题<span class="time">3天前</span></div>
                            <div class="ct">和问号的作用差不多，用于设置"贪婪模式"。问号的作用差<a href="#">升级会员</a>吧。</div>
                        </div>
                    </div>
                    <div class="li unread"  data-id="4">
                        <div class="d1"></div>
                        <div class="d2">
                            <div class="title">标题<span class="time">3天前</span></div>
                            <div class="ct">和问号的作用差不多，用于设置"贪婪模式"。问号的作用差<a href="#">升级会员</a>吧。</div>
                        </div>
                    </div>
                    <div class="li unread"  data-id="5">
                        <div class="d1"></div>
                        <div class="d2">
                            <div class="title">标题<span class="time">3天前</span></div>
                            <div class="ct">和问号的作用差不多，用于设置"贪婪模式"。问号的作用差<a href="#">升级会员</a>吧。</div>
                        </div>
                    </div>
                    <div class="li unread"  data-id="6">
                        <div class="d1"></div>
                        <div class="d2">
                            <div class="title">标题<span class="time">3天前</span></div>
                            <div class="ct">和问号的作用差不多，用于设置"贪婪模式"。问号的作用差<a href="#">升级会员</a>吧。</div>
                        </div>
                    </div>
                    <div class="li unread"  data-id="7">
                        <div class="d1"></div>
                        <div class="d2">
                            <div class="title">标题<span class="time">3天前</span></div>
                            <div class="ct">和问号的作用差不多，用于设置"贪婪模式"。问号的作用差<a href="#">升级会员</a>吧。</div>
                        </div>
                    </div>
                    <div class="li unread"  data-id="8">
                        <div class="d1"></div>
                        <div class="d2">
                            <div class="title">标题<span class="time">3天前</span></div>
                            <div class="ct">和问号的作用差不多，用于设置"贪婪模式"。问号的作用差<a href="#">升级会员</a>吧。</div>
                        </div>
                    </div>
                    <div class="li unread"  data-id="9">
                        <div class="d1"></div>
                        <div class="d2">
                            <div class="title">标题<span class="time">3天前</span></div>
                            <div class="ct">和问号的作用差不多，用于设置"贪婪模式"。问号的作用差<a href="#">升级会员</a>吧。</div>
                        </div>
                    </div>
                    <div class="pg-ctrl">
                        <button class="disabled" id="pg-before"><</button>
                        <button id="pg-next">></button>
                    </div>
                </div>
            </div>
        </div>
        <?php include("../layout/footer.php") ?>
    </div>
    <script>left.activeItem("msg");</script>
    <script>var totalMsg=<?php echo 100 ?>;</script>
    <script src="/web/iframe_userhome/js/msg.js"></script>
</body>
</html>