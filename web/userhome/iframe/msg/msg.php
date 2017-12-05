<?php
    require_once("../../../../global/config.php");
    include("../../../../global/checkLogin.php");

    $vid=$_SESSION["login"]["id"];
    //数据库操作
    $conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
    $conn->set_charset("utf8");
    //查询msg数量
    $stmt=$conn->prepare("select count(id) as count from msgs where vid=?");
    $stmt->bind_param("i",$vid);
    $stmt->execute();
    $result=$stmt->get_result();
    $data=$result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    $totalMsg=$data[0]["count"];
    //标记为预览
    $stmt=$conn->prepare("update msgs set state=1 where vid=? and state=0");
    $stmt->bind_param("i",$vid);
    $stmt->execute();
    $stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>消息-淘币客</title>
    <link href="/web/layout/img/logo.png" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/web/layout/css/layout.css">
    <link rel="stylesheet" type="text/css" href="/web/userhome/left/css/left.css">
    <link rel="stylesheet" type="text/css" href="/web/userhome/iframe/msg/css/msg.css">
</head>
<body>
    <?php include("../../../layout/top.php") ?>
    <div class="layout">
        <div class="main">
            <?php include("../../left/left.php") ?>
            <div class="right">
                <div class="h3">所有消息</div>
                <div class="s1">
                    <div class="head">
                        <a href="javascript:void(0);" id="selectAll">选择全部</a>
                        <a href="javascript:void(0);" id="remove">删除</a>
                        <span>选中<span id="checkNum" style="margin:0 2px;">0</span>项</span>
                    </div>
                    <div id="lis">
                        <?php if($totalMsg<=0){ ?>
                            <div class="no-record">暂无数据</div>
                        <?php } ?>
                    </div>
                    <div class="pg-ctrl">
                        <button class="disabled" id="pg-before"><</button>
                        <button class="disabled" id="pg-next">></button>
                    </div>
                </div>
            </div>
        </div>
        <?php include("../../../layout/footer.php") ?>
    </div>
    <script id="tpl-li" type="text/html">
        <div class="li {{unread}} {{check}}"  data-id="{{data.id}}">
            <div class="d1"></div>
            <div class="d2">
                <div class="title">{{data.title}}<span class="time">{{data.time}}</span></div>
                <div class="ct"></div>
            </div>
        </div>
    </script>
    <script>left.activeItem("msg");</script>
    <script>var totalMsg=<?php echo $totalMsg ?>;</script>
    <script src="/web/userhome/iframe/msg/js/msg.js"></script>
</body>
</html>