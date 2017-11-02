<?php
require_once("../global/global.php");
require_once("../global/TimeUtil.php");
//数据库连接
$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
$conn->set_charset("utf8");
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>coin</title>
    <style>
        .main .sec{margin:40px 0;}
        .sec .tb_h{position:relative;height:30px;margin:20px 0 15px 0;}
        .sec .tb_h h3{padding-left:10px;font-weight:500;font-size:20px;line-height:30px;margin:0;}
        .sec .tb_h h3:before{content:"";display:inline-block;width:4px;height:20px;vertical-align:-4px;background:#ff9900;border-radius:2px;margin-right:10px;}
        .sec .tb_h .tb_link{position:absolute;right:45px;top:0;line-height:30px;}
        .sec .tb_h .tb_link a{color:#2e7fd8;}

        .sec .tb{}
        .sec .tb table{width:100%;border-collapse:collapse;font-size:14px;color:#444;}
        .sec .tb table thead th{text-align:center;background:#f6f6f8;padding:10px 5px;font-weight:normal;color:#222;}
        .sec .tb table tbody td{text-align:center;padding:15px 5px;border-bottom:1px solid #ddd;}
        .sec .tb table tbody td.price{color:#009900;}
        .sec .tb table tbody tr:hover{transition:background 0.5s;background:#fbfbfb;}
        .sec .tb table tbody td a{color:#ff3a3a;font-size:12px;display:inline-block;padding:3px 12px;border:1px solid #ff3a3a;border-radius:3px;}
        .sec .tb table tbody td a:hover{transition:background 0.3s,color 0.3s; background:#ff3a3a;color:#ddd;}

        .sec .tb .no-record{height:200px;color:#b0b0b9;padding-top:155px;text-align:center;
            background-image:url(common/img/no-record.png);background-repeat:no-repeat;background-position:center center;background-size:auto 100px;}
        /**/
    </style>
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