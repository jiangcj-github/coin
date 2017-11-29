<?php
require_once("../../../../global/config.php");
include("../../../../global/checkLogin.php");
require_once("../../../../global/wallet/btc.php");

$vid=$_SESSION["login"]["id"];
//数据库操作
$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
$conn->set_charset("utf8");
//查询infos
$stmt=$conn->prepare("select phone,idcard,fullname,ac_pass from user_infos where vid=?");
$stmt->bind_param("i",$vid);
$stmt->execute();
$result=$stmt->get_result();
$info=$result->fetch_all(MYSQLI_ASSOC)[0];
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>出售虚拟货币-淘币客</title>
    <link href="/web/layout/img/logo.png" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/web/layout/css/layout.css">
    <link rel="stylesheet" type="text/css" href="/web/userhome/left/css/left.css">
    <link rel="stylesheet" type="text/css" href="/web/userhome/iframe/sell/css/sell.css">
</head>
<body>
<?php include("../../../layout/top.php") ?>
<div class="layout">
    <div class="main u">
        <?php include("../../left/left.php") ?>
        <div class="right">
            <div class="nav">
                <div class="h3">出售虚拟货币</div>
                <div class="f1 img-group x16">
                    <img src="/web/userhome/left/img/sell.svg">
                    <a href="/web/userhome/iframe/sell/sell.php">我的卖单</a>
                    <span style="margin:0 5px;">&gt;</span>
                    <span style="color:#999;">出售虚拟货币</span>
                </div>
            </div>
            <div class="s3">
                <div class="r1">
                    <div class="head">参考信息</div>
                    <div class="ct">
                        <div class="ri coin BTC"><span id="wd-coin">BTC</span></div>
                        <div class="ri2">
                            <div class="unit"><div class="up">可用</div><span id="wd-availNum" class="down">0</span></div>
                            <div class="unit"><div class="up">数量</div><span id="wd-num" class="down">0</span></div>
                            <div class="unit"><div class="up">锁定</div><span id="wd-lockNum" class="down">0</span></div>
                        </div>
                        <div class="ri"><label>当前价格：</label><span id="wd-15m-price">0</span>&nbsp<span>CNY</span></div>
                        <div class="ri"><label>卖出价格：</label><span id="wd-sell-price">0</span>&nbsp;<span>CNY</span></div>
                        <div class="ri"><label>购买价格：</label><span id="wd-buy-price">0</span>&nbsp;<span>CNY</span></div>
                    </div>
                </div>
                <div class="input-group">
                    <label for="coin">虚拟货币：</label>
                    <select id="coin">
                        <option value="BTC" selected="selected">BTC</option>
                    </select>
                    <span class="info">选择货币类型</span>
                </div>
                <div class="input-group">
                    <label for="price">价格：</label>
                    <input type="text" id="price" class="addon">
                    <span class="input-addon cny"></span>
                    <span class="info">您的出售价格，单位(元)</span>
                </div>
                <div class="input-group">
                    <label for="num">出售数量：</label>
                    <input type="text" id="num">
                    <span class="info">出售的货币数量</span>
                </div>
                <div class="input-group">
                    <label for="pay_method">付款方式：</label>
                    <input type="text" class="opt" id="pay_method">
                    <a href="javascript:void(0);" class="opt-btn">
                        <div class="select">
                            <div class="option">微信转账</div>
                            <div class="option">支付宝转账</div>
                            <div class="option">银行卡转账</div>
                        </div>
                    </a>
                    <span class="info">您预期的付款方式，2-15个字符不包含空格</span>
                </div>
                <div class="input-group">
                    <label for="remake">备注：</label>
                    <textarea id="remake" placeholder=""></textarea>
                    <span class="info">添加备注信息，不超过100个字符</span>
                </div>
                <div class="input-group">
                    <label for="ac_pass">资金密码：</label>
                    <input type="text" id="ac_pass" autocomplete="new" class="password">
                    <span class="info">为了您的账户安全，请输入交易密码</span>
                </div>
                <div class="f1">
                    <?php if(!$info["phone"]){ ?>
                        <button class="btn" id="submit" disabled="disabled">挂单</button>
                        <span class="info">您还未验证手机，不允许出售货币。</span>
                    <?php }else if(!$info["idcard"]||!$info["fullname"]){ ?>
                        <button class="btn" id="submit" disabled="disabled">挂单</button>
                        <span class="info">您还未实名认证，不允许出售货币。</span>
                    <?php }else if(!$info["ac_pass"]){ ?>
                        <button class="btn" id="submit" disabled="disabled">挂单</button>
                        <span class="info">您还未设置资金密码，请先设置资金密码。</span>
                    <?php }else{ ?>
                        <button class="btn" id="submit">挂单</button>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>
    <?php include("../../../layout/footer.php") ?>
</div>
<script>left.activeItem("sell");</script>
<script>
    $(".password").focus(function(){
        $(this).prop("type","password");
    });
</script>
<script src="/web/login/js/md5.min.js"></script>
<script src="/web/userhome/iframe/sell/js/u1_btc.js"></script>
</body>
</html>