<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户主页-淘币客</title>
    <link href="/web/common/img/logo.png" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/web/common/css/layout.css">
    <link rel="stylesheet" type="text/css" href="/web/common/css/userhome/left.css">
    <link rel="stylesheet" type="text/css" href="/web/common/css/userhome/home.css">
</head>
<body>
    <?php include("../layout/top.php") ?>
    <div class="layout">
        <div class="main">
            <?php include("left.php") ?>
            <div class="right">
                <div class="h3">账号信息</div>
                <div class="s1">
                    <div class="c1">
                        <svg viewBox="0 0 90 90" width="90" height="90">
                           <circle r="40" cx="45" cy="45" stroke-dasharray="<?php echo 314*(1-0.7) ?> 1000"></circle>
                        </svg>
                        <span class="f2">90%</span>
                        <span class="f3">信息完善度</span>
                    </div>
                    <table>
                        <colgroup>
                            <col style="width:140px">
                            <col style="width:140px">
                        </colgroup>
                        <tr> <td>邮箱：1011232</td>    <td>好评：1011232</td>    </tr>
                        <tr> <td>昵称：林打开</td>    <td>举报：1011232</td>    </tr>
                        <tr> <td>会员等级：0</td>
                    </table>
                </div>
                <div class="h3">快速通道</div>
                <div class="s2">

                </div>

            </div>
        </div>
        <?php include("../layout/footer.php") ?>
    </div>
    <script>left.activeItem("usered");</script>
</body>
</html>