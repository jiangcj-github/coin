<?php
require_once("../../../../global/config.php");
require_once("../../../../global/TimeUtil.php");
include("../../../../global/checkLogin.php");

$vid=$_SESSION["login"]["id"];
//数据库操作
$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
$conn->set_charset("utf8");
//查询ads
$ads=[];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的卖单-淘币客</title>
    <link href="/web/layout/img/logo.png" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/web/layout/css/layout.css">
    <link rel="stylesheet" type="text/css" href="/web/userhome/left/css/left.css">
    <link rel="stylesheet" type="text/css" href="/web/userhome/iframe/sell/css/sell.css">
</head>
<body>
<?php include("../../../layout/top.php") ?>
<div class="layout">
    <div class="main">
        <?php include("../../left/left.php") ?>
        <div class="right">
            <div class="head">
                <a href="/web/userhome/iframe/sell/u1.php">出售虚拟货币</a>
            </div>
            <div class="s1">
                <table>
                    <colgroup>
                        <col style="width:110px">
                        <col style="width:80px">
                        <col style="width:100px">
                        <col style="width:150px">
                        <col style="width:90px">
                        <col style="width:100px">
                        <col style="width:100px">
                        <col style="width:110px">
                    </colgroup>
                    <thead>
                    <tr> <th>发布时间</th><th>虚拟货币</th><th>出售价格(CNY)</th><th>付款方式</th><th>数量</th><th></th></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>6天前</td>
                            <td>BTC</td>
                            <td>55000</td>
                            <td>银行卡</td>
                            <td>5</td>
                            <td>
                                <a href="" title="设置" class="edit"></a>
                                <a href="javascript:void(0);" title="删除" class="del" onclick="remove(0);"></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php if(count($ads)<=0){ ?>
                    <div class="no-record">暂无数据</div>
                <?php } ?>
            </div>
            <div class="s2">
                <div class="para">出售须知：</div>
                <div class="para">1.&nbsp;您必须先<a href="/web/userhome/iframe/usered/u3.php">验证手机</a>，并且完成<a href="/web/userhome/iframe/usered/u4.php">实名认证</a>，才能发布广告。</div>
                <div class="para">2.&nbsp;发布卖单后您所出售的部分虚拟货币将被锁定，直至取消卖单或者出售完成。</div>
                <div class="para">2.&nbsp;了解如何交易虚拟货币，以及交易流程。确保交易过程中资产安全。<a href="#">详细</a></div>
            </div>
        </div>
    </div>
    <?php include("../../../layout/footer.php") ?>
</div>
<script>left.activeItem("sell");</script>
</body>
</html>