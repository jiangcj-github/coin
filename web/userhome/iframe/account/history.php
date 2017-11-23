<?php
    require_once("../../../../global/config.php");
    include("../../../../global/checkLogin.php");

    $vid=$_SESSION["login"]["id"];
    //数据库操作
    $conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
    $conn->set_charset("utf8");
    //获取所有钱包地址
    $stmt=$conn->prepare("select btcAddr from user_wallets where vid=?");
    $stmt->bind_param("i",$vid);
    $stmt->execute();
    $resutl=$stmt->get_result();
    $data=$resutl->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    //
    $history=[];
    //btc交易记录
    $btcAddr=$data[0]["btcAddr"];
    $bd=json_decode(file_get_contents("https://blockchain.info/rawaddr/$btcAddr"));
    foreach($bd->txs as $v){
        foreach($v->inputs as $v1){
            if($v1->prev_out->addr==$btcAddr){
                $hash=$v->hash;
                $coin="btc";
                $type=false;
                $value=$v1->prev_out->value*0.00000001;
                $time=date("Y-m-d H:i:s",$v->time);
                array_push($history,["hash"=>$hash,"coin"=>$coin,"type"=>$type,"value"=>$value,"time"=>$time]);
                goto stop;
            }
        }
        foreach($v->out as $v1){
            $item=[];
            if($v1->addr==$btcAddr){
                $hash=$v->hash;
                $coin="btc";
                $type=true;
                $value=$v1->value*0.00000001;
                $time=date("Y-m-d H:i:s",$v->time);
                array_push($history,["hash"=>$hash,"coin"=>$coin,"type"=>$type,"value"=>$value,"time"=>$time]);
                goto stop;
            }
        }
        stop:
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>账户记录-淘币客</title>
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
            <div class="nav">
                <div class="h3">账户记录</div>
                <div class="f1 img-group x16">
                    <img src="/web/userhome/left/img/account.svg">
                    <a href="/web/userhome/iframe/account/account.php">我的账户</a>
                    <span style="margin:0 5px;">&gt;</span>
                    <span style="color:#999;">账户记录</span>
                </div>
            </div>
            <div class="s4">
                <div class="li-head">
                    <div class="time">时间</div>
                    <div class="coin">货币</div>
                    <div class="type">类型</div>
                    <div class="value">数量</div>
                    <div class="hash">Hash值</div>
                </div>
                <?php foreach($history as $v){ ?>
                    <div class="li">
                        <div class="time"><?php echo $v["time"] ?></div>
                        <div class="coin"><?php echo $v["coin"] ?></div>
                        <div class="type"><?php echo $v["type"]?"转入":"转出" ?></div>
                        <div class="value"><?php echo $v["value"] ?></div>
                        <div class="hash"><?php echo $v["hash"] ?></div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
    <?php include("../../../layout/footer.php") ?>

</div>
<script>left.activeItem("account");</script>
</body>
</html>