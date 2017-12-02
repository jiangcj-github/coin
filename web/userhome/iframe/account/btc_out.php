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
    <div class="main u">
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
                    <span class="label">总共</span><span class="ct" id="btcNum">0</span>
                </div>
                <div class="f2">
                    <span class="label">锁定</span><span class="ct" id="btcLock">0</span>
                </div>
                <div class="f2">
                    <span class="label">可用</span><span class="ct" id="btcAvail">0</span>
                </div>
            </div>
            <div class="s3">
                <div class="input-group">
                    <label for="addr">转出至：</label>
                    <input type="text" id="addr" style="width:400px;">
                    <span class="info">比特币转出地址，转出前请仔细确认地址是否正确</span>
                </div>
                <div class="input-group">
                    <label for="num">数量：</label>
                    <input type="text" id="num" value="0">
                    <span class="info">转出数量</span>
                </div>
                <div class="input-group">
                    <label for="ac_pass">交易密码：</label>
                    <input type="text" id="ac_pass" class="password">
                    <span class="info">您设置的资产密码</span>
                </div>
                <div class="input-group">
                    <label for="check">手机验证码：</label>
                    <input type="text" id="check"><button class="addon" id="checkBtn">获取验证码</button>
                    <span class="info">发送后15分钟内有效，请尽快输入</span>
                </div>
                <div class="f1">
                    <label>
                        <input type="checkbox" id="protocol">
                        <span>我已仔细阅读并同意<a href="#">《转出协议》</a></span>
                    </label>
                </div>
                <div class="f2">
                    <?php if(!$_SESSION["login"]["phone"]){ ?>
                        <button id="submit" disabled="disabled">确认转出</button>
                        <span class="info">您未设置手机号码</span>
                    <?php }else if(!$_SESSION["login"]["idcard"]||!$_SESSION["login"]["fullname"]){ ?>
                        <button id="submit" disabled="disabled">确认转出</button>
                        <span class="info">您未进行实名认证</span>
                    <?php }else if(!$_SESSION["login"]["ac_pass"]){ ?>
                        <button id="submit" disabled="disabled">确认转出</button>
                        <span class="info">您未设置资金密码</span>
                    <?php }else{ ?>
                        <button id="submit">确认转出</button>
                    <?php } ?>
                </div>
            </div>
            <div class="s22">
                <div class="para">转出说明</div>
                <div class="para">1.&nbsp;您必须先<a href="/web/userhome/iframe/usered/u3.php">验证手机</a>，并且完成<a href="/web/userhome/iframe/usered/u4.php">实名认证</a>，才能进行该操作。</div>
                <div class="para">2.&nbsp;货币的转出是自动的，实际入账时间取决于区块链网络的确认速度。<a href="#">详细</a></div>
                <div class="para">3.&nbsp;货币的转入转出是完全免费的，我们不会收取任何手续费。</div>
            </div>
        </div>
    </div>
    <?php include("../../../layout/footer.php") ?>
</div>
<script>left.activeItem("account");</script>
<script>
    $(".password").focus(function(){
        $(this).prop("type","password");
    });
</script>
<script src="/web/login/js/md5.min.js"></script>
<script src="/web/userhome/iframe/account/js/btc_out.js"></script>
</body>
</html>