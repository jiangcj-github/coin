<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户中心-淘币客</title>
    <link href="/web/common/img/logo.png" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/web/common/css/layout.css">
    <link rel="stylesheet" type="text/css" href="/web/common/css/userhome/left.css">
    <link rel="stylesheet" type="text/css" href="/web/common/css/userhome/ad.css">
</head>
<body>
    <?php include("../layout/top.php") ?>
    <div class="layout">
        <div class="main">
            <?php include("left.php") ?>
            <div class="right">
                <div class="head">
                    <a href="#">发布广告</a>
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
                        <tr> <th>发布时间</th><th>类型</th><th>虚拟货币</th><th>期望价格</th><th>交易方式</th><th>最小限额</th><th>最大限额</th><th></th></tr>
                        </thead>

                        <tbody>
                            <tr> <td>3天前</td> <td>买入</td> <td>BTC</td> <td class="price">33212.2 CNY</td> <td>qq</td><td>0</td> <td>3</td> <td><a href="#">编辑</a><a href="#">删除</a></td></tr>
                            <tr> <td>3天前</td> <td>卖出</td> <td>BTC</td> <td class="price">33212.2 CNY</td> <td>微信</td><td>0</td> <td>3</td> <td><a href="#">编辑</a><a href="#">删除</a></td></tr>
                            <tr> <td>3天前</td> <td>买入</td> <td>BTC</td> <td class="price">33212.2 CNY</td> <td>当面</td><td>0</td> <td>3</td> <td><a href="#">编辑</a><a href="#">删除</a></td></tr>
                            <tr> <td>3天前</td> <td>卖出</td> <td>BTC</td> <td class="price">33212.2 CNY</td> <td>当面</td><td>0</td> <td>3</td> <td><a href="#">编辑</a><a href="#">删除</a></td></tr>
                        </tbody>

                    </table><!--
                    <div class="no-record">暂无数据</div> -->
                </div>
                <div class="s2">
                    <div class="para">发布广告时您可以选择更多币种，广告的交易流程不会经过平台，平台无法保证您的资产安全，请谨慎交易。<a href="#">查看更多</a></div>
                    <div class="para">注册用户每个月有100次免费发布广告的次数，升级会员会获得更多的次数。</div>
                </div>
            </div>
        </div>
        <?php include("../layout/footer.php") ?>
    </div>
    <script>left.activeItem("ad");</script>
</body>
</html>