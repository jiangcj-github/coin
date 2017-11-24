<?php
    require_once("../../../global/config.php");
    //数据库操作
    $conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
    $conn->set_charset("utf8");
    //查询msg数量
    $result=$conn->query("select * from notices");
    $data=$result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>公告-淘币客</title>
    <link href="/web/layout/img/logo.png" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/web/layout/css/layout.css">
    <link rel="stylesheet" type="text/css" href="/web/sys/left/css/left.css">
    <link rel="stylesheet" type="text/css" href="/web/sys/notice/css/notice.css">
</head>
<body>
    <?php include("../../layout/top.php") ?>
    <div class="layout">
        <div class="main">
            <?php include("../left/left.php") ?>
            <div class="right">
                <div class="h3">公告</div>
                <div class="s1">
                    <?php foreach($data as $v){ ?>
                        <a href="/web/sys/notice/page/<?php echo $v["href"] ?>" class="li">
                            <span class="b"><?php echo $v["title"] ?></span>
                            <span class="time"><?php echo $v["time"] ?></span>
                        </a>
                    <?php } ?>
                </div>
                <div class="pg-ctrl">
                    <button class="disabled" id="pg-before"><</button>
                    <button class="disabled" id="pg-next">></button>
                </div>
            </div>

        </div>
        <?php include("../../layout/footer.php") ?>
    </div>
    <script>left.activeIndex(0)</script>
    <script>var noticeNum=<?php echo count($data) ?>;</script>
    <script src="/web/sys/notice/js/notice.js"></script>
</body>
</html>