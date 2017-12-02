<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的账户-淘币客</title>
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
            <div class="h3">账户信息</div>
            <div class="s1">
                <table>
                    <colgroup>
                        <col style="width:100px">
                        <col style="width:330px">
                        <col style="width:100px">
                        <col style="width:100px">
                        <col style="width:100px">
                        <col style="width:110px">
                    </colgroup>
                    <thead>
                        <tr><th>虚拟货币</th><th>钱包地址</th><th>数量</th><th>锁定</th><th>可用</th><th></th></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><div class="img-g"><img src="/web/userhome/iframe/account/img/btc.png">BTC</div></td>
                            <td id="btcAddr"><?php echo $_SESSION["login"]["btcAddr"] ?></td>
                            <td id="btcNum">0</td>
                            <td id="btcLock">0</td>
                            <td id="btcAvail">0</td>
                            <td>
                                <a href="/web/userhome/iframe/account/btc_in.php">转入</a>
                                <a href="/web/userhome/iframe/account/btc_out.php">转出</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="s12">
                <a href="/web/userhome/iframe/account/history.php">查看账户记录</a>
            </div>
        </div>
    </div>
    <?php include("../../../layout/footer.php") ?>
</div>
<script>left.activeItem("account");</script>
<script src="/web/userhome/iframe/account/js/account.js"></script>
</body>
</html>