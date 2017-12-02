<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>转入BTC-淘币客</title>
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
                <div class="h3">转入BTC</div>
                <div class="f1 img-group x16">
                    <img src="/web/userhome/left/img/account.svg">
                    <a href="/web/userhome/iframe/account/account.php">我的账户</a>
                    <span style="margin:0 5px;">&gt;</span>
                    <span style="color:#999;">转入BTC</span>
                </div>
            </div>
            <div class="s2">
                <div class="f1">
                    <img src="/web/userhome/iframe/account/img/btc.png">
                    <span class="coin">BTC</span>
                </div>
                <div class="f2">
                    <span class="label">总共</span><span class="ct" id="btcNum">0</span>
                </div>
                <div class="f2">
                    <span class="label">锁定</span><span class="ct" id="btnLock">0</span>
                </div>
                <div class="f2">
                    <span class="label">可用</span><span class="ct" id="btcAvail">0</span>
                </div>

            </div>
            <div class="s21">
                <div class="h4">这是您的钱包地址，请将BTC转入到此地址:</div>
                <div class="f1">
                    <img src="/web/userhome/iframe/account/img/btc.png" class="c1">
                    <span class="c2">BTC</span>
                    <span class="c3"><?php echo $_SESSION["login"]["btcAddr"] ?></span>
                    <img class="c4" src="/action/account/qrcode.php?text=<?php echo $_SESSION["login"]["btcAddr"] ?>">
                </div>
            </div>
            <div class="s22">
                <div class="para">转入说明</div>
                <div class="para">1.&nbsp;货币的转入是自动的，实际入账时间取决于区块链网络的确认速度。<a href="#">详细</a></div>
                <div class="para">2.&nbsp;该地址是您专有的钱包地址，转账前请仔细确认地址是否正确，您可以同时进行多次充值。</div>
            </div>
        </div>
    </div>
    <?php include("../../../layout/footer.php") ?>

</div>
<script>left.activeItem("account");</script>
<script src="/web/userhome/iframe/account/js/btc_in.js"></script>
</body>
</html>