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
                        <div class="hash">Hash值</div>
                    </div>
                    <div class="loading">数据加载中...</div>
                </div>
            </div>
        </div>
        <?php include("../../../layout/footer.php") ?>

    </div>
    <script id="tpl-li" type="text/html">
        <div class="li">
            <div class="time">{{data.time}}</div>
            <div class="coin">{{data.coin}}</div>
            <div class="type">{{data.type}}</div>
            <div class="value">{{data.value}}</div>
            <div class="hash">{{data.hash}}</div>
        </div>
    </script>
    <script>left.activeItem("account");</script>
    <script src="/web/userhome/iframe/account/js/history.js"></script>
</body>
</html>