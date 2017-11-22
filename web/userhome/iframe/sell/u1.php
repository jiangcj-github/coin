<?php
require_once("../../../../global/config.php");
include("../../../../global/checkLogin.php");

$vid=$_SESSION["login"]["id"];
//数据库操作
$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
$conn->set_charset("utf8");
//修改
$isModify=false;
$sell=["id"=>0,"flag"=>0,"coin"=>"","price"=>"","method"=>"","minNum"=>0,"maxNum"=>100,"remake"=>""];
if(isset($_REQUEST["id"])){
    $id=$_REQUEST["id"];
    //查询sells

}
//查询infos
$info=["phone"=>true,"idcard"=>true,"fullname"=>true];
if(!$isModify){
    $stmt=$conn->prepare("select phone,idcard,fullname from user_infos where vid=?");
    $stmt->bind_param("i",$vid);
    $stmt->execute();
    $result=$stmt->get_result();
    $info=$result->fetch_all(MYSQLI_ASSOC)[0];
    $stmt->close();
}
//页面参数
$page=[];
$page["title"]=$isModify?"设置出售信息":"出售虚拟货币";
$page["submitBtn"]=$isModify?"设置":"出售";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $page["title"] ?>-淘币客</title>
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
            <div class="nav">
                <div class="h3"><?php echo $page["title"] ?></div>
                <div class="f1 img-group x16">
                    <img src="/web/userhome/left/img/sell.svg">
                    <a href="/web/userhome/iframe/sell/sell.php">我的卖单</a>
                    <span style="margin:0 5px;">&gt;</span>
                    <span style="color:#999;"><?php echo $page["title"] ?></span>
                </div>
            </div>
            <div class="s3">
                <div class="r1">
                    <div class="head">参考信息</div>
                    <div class="ct">
                        <div class="ri coin BTC"><span id="wd-coin">BTC</span></div>
                        <div class="ri2">
                            <div class="unit"><div class="up">可用</div><span id="wd-availNum" class="down">2</span></div>
                            <div class="unit"><div class="up">数量</div><span id="wd-num" class="down">3</span></div>
                            <div class="unit"><div class="up">锁定</div><span id="wd-lockNum" class="down">4</span></div>
                        </div>
                        <div class="ri"><label>当前价格：</label><span id="wd-15m-price"></span>&nbsp;<span>CNY</span></div>
                        <div class="ri"><label>卖出价格：</label><span id="wd-sell-price"></span>&nbsp;<span>CNY</span></div>
                        <div class="ri"><label>购买价格：</label><span id="wd-buy-price"></span>&nbsp;<span>CNY</span></div>
                    </div>
                </div>
                <div class="input-group">
                    <label for="coin">虚拟货币：</label>
                    <select>
                        <option>BTC</option>
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
                    <label for="minNum">出售数量：</label>
                    <input type="text" id="minNum">
                    <span class="info">出售的货币数量</span>
                </div>
                <div class="input-group">
                    <label for="remake">备注：</label>
                    <textarea id="remake" placeholder="添加备注信息，不超过100个字符"></textarea>
                </div>
                <div class="f1">
                    <?php if(!$info["phone"]){ ?>
                        <button class="btn" id="submit" disabled="disabled"><?php echo $page["submitBtn"] ?></button>
                        <span class="info">您还未验证手机，不允许出售货币。</span>
                    <?php }else if(!$info["idcard"]||!$info["fullname"]){ ?>
                        <button class="btn" id="submit" disabled="disabled"><?php echo $page["submitBtn"] ?></button>
                        <span class="info">您还未实名认证，不允许出售货币。</span>
                    <?php }else{ ?>
                        <button class="btn" id="submit"><?php echo $page["submitBtn"] ?></button>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>
    <?php include("../../../layout/footer.php") ?>
</div>
<script>left.activeItem("sell");</script>
<script>
    var isModify=<?php echo $isModify?"true":"false" ?>;
    var aid=<?php echo $sell["id"] ?>;
</script>
<script src="/web/userhome/iframe/sell/js/u1.js"></script>
</body>
</html>