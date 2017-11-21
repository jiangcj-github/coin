<?php
    require_once("../../../../global/config.php");
    include("../../../../global/checkLogin.php");

    $vid=$_SESSION["login"]["id"];
    //数据库操作
    $conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
    $conn->set_charset("utf8");
    //修改
    $isModify=false;
    $ad=["id"=>0,"flag"=>0,"coin"=>"","price"=>"","method"=>"","minNum"=>0,"maxNum"=>100,"remake"=>""];
    if(isset($_REQUEST["id"])){
        $id=$_REQUEST["id"];
        //查询ad
        $stmt=$conn->prepare("select id,flag,coin,price,method,minNum,maxNum,remake from ads where id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result=$stmt->get_result();
        $data=$result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        if(count($data)>0){
            $ad=$data[0];
            $isModify=true;
        }
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
    $page["title"]=$isModify?"设置广告":"发布广告";
    $page["submitBtn"]=$isModify?"设置":"发布";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $page["title"] ?>-淘币客</title>
    <link href="/web/layout/img/logo.png" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/web/layout/css/layout.css">
    <link rel="stylesheet" type="text/css" href="/web/userhome/left/css/left.css">
    <link rel="stylesheet" type="text/css" href="/web/userhome/iframe/ad/css/ad.css">
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
                        <img src="/web/userhome/left/img/ad.svg">
                        <a href="/web/userhome/iframe/ad/ad.php">我的广告</a>
                        <span style="margin:0 5px;">&gt;</span>
                        <span style="color:#999;"><?php echo $page["title"] ?></span>
                    </div>
                </div>
                <div class="s3">
                    <div class="input-group">
                        <label for="flag">广告类型：</label>
                        <div class="ratio-group" id="flag">
                            <?php if($ad["flag"]==0){ ?>
                                <i class="ratio on" data-val="0">买入</i>
                                <i class="ratio" data-val="1">卖出</i>
                            <?php }else if($ad["flag"]==1){ ?>
                                <i class="ratio" data-val="0">买入</i>
                                <i class="ratio on" data-val="1">卖出</i>
                            <?php }else{ ?>
                                <i class="ratio" data-val="0">买入</i>
                                <i class="ratio" data-val="1">卖出</i>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="input-group">
                        <label for="coin">虚拟货币：</label>
                        <input type="text" class="opt" placeholder="货币简称,如BTC" id="coin" value="<?php echo $ad["coin"] ?>">
                        <a href="javascript:void(0);" class="opt-btn">
                            <div class="select">
                                <div class="option">BTC</div>
                                <div class="option">BCC</div>
                                <div class="option">LTC</div>
                                <div class="option">ETH</div>
                                <div class="option">ETC</div>
                            </div>
                        </a>
                        <span class="info">选择货币类型</span>
                    </div>
                    <div class="input-group">
                        <label for="price">价格：</label>
                        <input type="text" id="price" class="addon" value="<?php echo $ad["price"] ?>">
                        <span class="input-addon cny"></span>
                        <span class="info">您的期望价格，单位(元)</span>
                    </div>
                    <div class="input-group">
                        <label for="minNum">最小交易量：</label>
                        <input type="text" id="minNum" value="<?php echo $ad["minNum"] ?>">
                        <span class="info">每一笔交易的最小数量，默认为&nbsp;0</span>
                    </div>
                    <div class="input-group">
                        <label for="maxNum">最大交易量：</label>
                        <input type="text" id="maxNum" value="<?php echo $ad["maxNum"] ?>">
                        <span class="info">每一笔交易的最大数量</span>
                    </div>
                    <div class="input-group">
                        <label for="method">交易方式：</label>
                        <input type="text" class="opt" placeholder="不超过6个字符" id="method" value="<?php echo $ad["method"] ?>">
                        <a href="javascript:void(0);" class="opt-btn">
                            <div class="select">
                                <div class="option">当面交易</div>
                                <div class="option">电话交易</div>
                                <div class="option">QQ交易</div>
                                <div class="option">微信交易</div>
                            </div>
                        </a>
                        <span class="info">您期望的交易方式</span>
                    </div>
                    <div class="input-group">
                        <label for="remake">备注：</label>
                        <textarea id="remake" placeholder="不超过100个字符"><?php echo $ad["remake"] ?></textarea>
                        <span class="info">为该条广告添加备注信息</span>
                    </div>
                    <div class="f1">
                        <?php if(!$info["phone"]){ ?>
                            <button class="btn" id="submit" disabled="disabled"><?php echo $page["submitBtn"] ?></button>
                            <span class="info">您还未验证手机，不允许发布广告。</span>
                        <?php }else if(!$info["idcard"]||!$info["fullname"]){ ?>
                            <button class="btn" id="submit" disabled="disabled"><?php echo $page["submitBtn"] ?></button>
                            <span class="info">您还未实名认证，不允许发布广告。</span>
                        <?php }else{ ?>
                            <button class="btn" id="submit"><?php echo $page["submitBtn"] ?></button>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>
        <?php include("../../../layout/footer.php") ?>
    </div>
    <script>left.activeItem("ad");</script>
    <script>
        var isModify=<?php echo $isModify?"true":"false" ?>;
        var aid=<?php echo $ad["id"] ?>;
    </script>
    <script src="/web/userhome/iframe/ad/js/u1.js"></script>
</body>
</html>