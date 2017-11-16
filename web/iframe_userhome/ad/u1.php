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
                <div class="nav">
                    <div class="h3">发布广告</div>
                    <div class="f1 img-group x16">
                        <img src="/web/common/img/userhome/left/ad.svg">
                        <a href="/web/iframe_userhome/ad.php">我的广告</a>
                        <span style="margin:0 5px;">&gt;</span>
                        <span style="color:#999;">发布广告</span>
                    </div>
                </div>
                <div class="s3">
                    <div class="input-group">
                        <label for="flag">广告类型：</label>
                        <div class="ratio-group">
                            <i class="ratio on">买入</i>
                            <i class="ratio">卖出</i>
                        </div>
                    </div>
                    <div class="input-group">
                        <label for="coin">虚拟货币：</label>
                        <select id="coin" class="opt-sel">
                            <option value="BTC">BTC</option>
                            <option value="BCC">BCC</option>
                            <option value="LTC">LTC</option>
                            <option value="ETH">ETH</option>
                            <option value="ETC">ETC</option>
                            <option value="0">其他</option>
                        </select>
                        <input type="text" class="opt" placeholder="货币简称,如BTC">
                        <span class="info">选择货币类型</span>
                    </div>
                    <div class="input-group">
                        <label for="price">价格：</label>
                        <input type="text" id="price" class="addon">
                        <span class="input-addon cny"></span>
                        <span class="info">您的期望价格，单位(元)</span>
                    </div>
                    <div class="input-group">
                        <label for="minNum">最小交易量：</label>
                        <input type="text" id="minNum">
                        <span class="info">每一笔交易的最小数量，默认为&nbsp;0</span>
                    </div>
                    <div class="input-group">
                        <label for="maxNum">最大交易量：</label>
                        <input type="text" id="maxNum">
                        <span class="info">每一笔交易的最大数量</span>
                    </div>
                    <div class="input-group">
                        <label for="method">交易方式：</label>
                        <select id="method" class="opt-sel">
                            <option value="当面交易">当面交易</option>
                            <option value="电话交易">电话交易</option>
                            <option value="QQ交易">QQ交易</option>
                            <option value="微信交易">微信交易</option>
                            <option value="0">其他</option>
                        </select>
                        <input type="text" class="opt" placeholder="不超过5个字符">
                        <span class="info">您期望的交易方式</span>
                    </div>
                    <div class="input-group">
                        <label for="remake">备注：</label>
                        <textarea id="remake"></textarea>
                        <span class="info">添加备注</span>
                    </div>
                    <div class="f1">
                        <button class="btn" id="submit">发布</button>
                    </div>
                </div>

            </div>
        </div>
        <?php include("../../layout/footer.php") ?>
    </div>
    <script>left.activeItem("ad");</script>
    <script src="/web/iframe_userhome/ad/js/u1.js"></script>
</body>
</html>