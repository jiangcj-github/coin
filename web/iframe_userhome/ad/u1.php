<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>发布广告-淘币客</title>
    <link href="/web/common/img/logo.png" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/web/common/css/layout.css">
    <link rel="stylesheet" type="text/css" href="/web/common/css/userhome/left.css">
    <link rel="stylesheet" type="text/css" href="/web/common/css/userhome/ad.css">
</head>
<body>
<?php include("../../layout/top.php") ?>
<div class="layout">
    <div class="main">
        <?php include("../left.php") ?>
        <div class="right">
            <div class="h3">发布广告</div>

            <div class="s3">
                <div class="input-group">
                    <label for="pass1">广告类型：</label>
                    <select>
                        <option value="0">买入</option>
                        <option value="1">卖出</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="pass">虚拟货币：</label>
                    <input type="password" id="pass2">
                </div>
                <div class="input-group">
                    <label for="pass3">价格：</label>
                    <input type="password" id="pass3">
                </div>
                <div class="input-group">
                    <label for="pass3">数量：</label>
                    <input type="password" id="pass3">
                    <input type="password" id="pass3">
                </div>
                <div class="input-group">
                    <label for="pass3">交易方式：</label>
                    <select>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">3</option>
                        <option value="其他">其他</option>
                        <input type="password" id="pass3">
                    </select>
                </div>
            </div>

        </div>
    </div>
    <?php include("../../layout/footer.php") ?>
</div>
<script>left.activeItem("ad");</script>
</body>
</html>