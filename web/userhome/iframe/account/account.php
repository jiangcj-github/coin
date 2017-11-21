<?php
    require_once("../../../../global/config.php");
    require_once("../../../../global/TimeUtil.php");
    include("../../../../global/checkLogin.php");

    $vid=$_SESSION["login"]["id"];
    //数据库操作
    $conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
    $conn->set_charset("utf8");

?>
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
                        <col style="width:300px">
                        <col style="width:100px">
                        <col style="width:100px">
                        <col style="width:100px">
                        <col style="width:140px">
                    </colgroup>
                    <thead>
                        <tr><th>虚拟货币</th><th>钱包地址</th><th>数量</th><th>锁定</th><th>可用</th><th></th></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>BTC</td>
                            <td>1HKdWCuKn9YPGXZFKevTTHojUFx8ztct5d</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>
                                <a href="">转入</a>
                                <a href="">转出</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="s2">
                <div class="para">使用须知：</div>
                <div class="para">1.&nbsp;您必须先<a href="/web/userhome/iframe/usered/u3.php">验证手机</a>，并且完成<a href="/web/userhome/iframe/usered/u4.php">实名认证</a>，才能发布广告。</div>
                <div class="para">2.&nbsp;发布广告时您可以选择更多币种，广告的交易流程不会经过平台，平台无法保证您的资金安全，请谨慎交易。<a href="#">详细</a></div>
                <div class="para">3.&nbsp;注册用户每个月有100次免费发布广告的机会，<a href="#">升级会员</a>会获得更多的次数。</div>
            </div>
        </div>
    </div>
    <?php include("../../../layout/footer.php") ?>
</div>
<script>left.activeItem("account");</script>
</body>
</html>