<?php
require_once("../global/global.php");
require_once("../global/TimeUtil.php");
//数据库连接
$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
$conn->set_charset("utf8");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>coin</title>
    <link rel="stylesheet" type="text/css" href="/web/common/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="/web/common/css/index.css" />
</head>
<body>
<?php include("layout/top.php") ?>
<div class="layout">
    <div class="main">
        <div class="sec">
            <div class="tb_h">
                <h3>货币买盘</h3>
                <div class="tb_link">
                    <a href="#">查看更多></a>
                </div>
            </div>
            <div class="tb">
                <table>
                    <colgroup>
                        <col style="width:160px">
                        <col style="width:180px">
                        <col style="width:130px">
                        <col style="width:200px">
                        <col style="width:130px">
                        <col style="width:130px">
                        <col style="width:150px">
                    </colgroup>
                    <thead>
                    <tr> <th>发布时间</th> <th>卖家</th> <th>虚拟货币</th> <th>期望价格</th> <th>最小限额</th> <th>最大限额</th> <th></th></tr>
                    </thead>
                    <tbody>
                    <tr> <td>3天前</td> <td>lindakai</td> <td>BTC</td> <td class="price">33212.2 CNY</td> <td>无限制</td> <td>3</td> <td><a href="#">购买</a></td></tr>
                    <tr> <td>3天前</td> <td>lindakai</td> <td>BTC</td> <td class="price">33212.2 CNY</td> <td>无限制</td> <td>3</td> <td><a href="#">购买</a></td></tr>
                    <tr> <td>3天前</td> <td>lindakai</td> <td>BTC</td> <td class="price">33212.2 CNY</td> <td>无限制</td> <td>3</td> <td><a href="#">购买</a></td></tr>
                    <tr> <td>3天前</td> <td>lindakai</td> <td>BTC</td> <td class="price">33212.2 CNY</td> <td>无限制</td> <td>3</td> <td><a href="#">购买</a></td></tr>
                    <tr> <td>3天前</td> <td>lindakai</td> <td>BTC</td> <td class="price">33212.2 CNY</td> <td>无限制</td> <td>3</td> <td><a href="#">购买</a></td></tr>
                    <tr> <td>3天前</td> <td>lindakai</td> <td>BTC</td> <td class="price">33212.2 CNY</td> <td>无限制</td> <td>3</td> <td><a href="#">购买</a></td></tr>
                    <tr> <td>3天前</td> <td>lindakai</td> <td>BTC</td> <td class="price">33212.2 CNY</td> <td>无限制</td> <td>3</td> <td><a href="#">购买</a></td></tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="sec">
            <div class="tb_h">
                <h3>货币买盘</h3>
                <div class="tb_link">
                    <a href="#">查看更多></a>
                </div>
            </div>
            <div class="tb">
                <table>
                    <colgroup>
                        <col style="width:160px">
                        <col style="width:180px">
                        <col style="width:130px">
                        <col style="width:200px">
                        <col style="width:130px">
                        <col style="width:130px">
                        <col style="width:150px">
                    </colgroup>
                    <thead>
                    <tr><th>发布时间</th> <th>卖家</th> <th>虚拟货币</th> <th>期望价格</th> <th>最小限额</th> <th>最大限额</th> <th></th></tr>
                    </thead>
                </table>
                <div class="no-record">暂无数据</div>
            </div>
        </div>
    </div>
    <?php include("layout/footer.php") ?>
</div>
</body>
</html>