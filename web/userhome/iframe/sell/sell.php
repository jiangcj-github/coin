<?php
    require_once("../../../../global/config.php");
    require_once("../../../../global/TimeUtil.php");
    include("../../../../global/checkLogin.php");

    $vid=$_SESSION["login"]["id"];
    //数据库操作
    $conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
    $conn->set_charset("utf8");
    //查询sells
    $stmt=$conn->prepare("select id,coin,price,pay_method,num,time,state from sells where vid=? order by time desc");
    $stmt->bind_param("i",$vid);
    $stmt->execute();
    $result=$stmt->get_result();
    $sells=$result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
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
                <a href="/web/userhome/iframe/sell/u1_btc.php" class="new">出售虚拟货币</a>
                <a href="/web/userhome/iframe/sell/u1_btc.php" class="info">交易记录></a>
            </div>
            <div class="s1">
                <table>
                    <colgroup>
                        <col style="width:120px">
                        <col style="width:100px">
                        <col style="width:140px">
                        <col style="width:140px">
                        <col style="width:100px">
                        <col style="width:120px">
                        <col style="width:120px">
                    </colgroup>
                    <thead>
                    <tr> <th>发布时间</th><th>虚拟货币</th><th>出售价格(CNY)</th><th>付款方式</th><th>数量</th><th>状态</th><th></th></tr>
                    </thead>
                    <tbody>
                        <?php foreach($sells as $v){ ?>
                            <tr>
                                <td><?php echo time_tran($v["time"]) ?></td>
                                <td><?php echo $v["coin"] ?></td>
                                <td><?php echo $v["price"] ?></td>
                                <td><?php echo $v["pay_method"] ?></td>
                                <td><?php echo $v["num"] ?></td>
                                <td><?php echo $v["state"]?"交易中":"正常挂单" ?></td>
                                <td>
                                    <?php if($v["state"]==0){ ?>
                                        <a href="javascript:void(0);" title="撤销" class="del" onclick="remove('<?php echo $v["id"] ?>')"></a>
                                    <?php }else{ ?>
                                        <a class="lock"></a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php if(count($sells)<=0){ ?>
                    <div class="no-record">暂无数据</div>
                <?php } ?>
            </div>
            <div class="s2">
                <div class="para">出售须知：</div>
                <div class="para">1.&nbsp;您必须先<a href="/web/userhome/iframe/usered/u3.php">验证手机</a>，并且完成<a href="/web/userhome/iframe/usered/u4.php">实名认证</a>，才能发布广告。</div>
                <div class="para">2.&nbsp;发布卖单后您所出售的部分虚拟货币将被锁定，直至取消卖单或者出售完成。</div>
                <div class="para">2.&nbsp;了解如何交易虚拟货币，以及交易流程。如何确保交易过程中资产安全，请点击右侧链接。<a href="#">详细</a></div>
            </div>
        </div>
    </div>
    <?php include("../../../layout/footer.php") ?>
</div>
<script>left.activeItem("sell");</script>
<script>
    var remove=function(id){
        if(!confirm("该操作不可恢复，确定要删除吗？")){
            return 0;
        }
        ajaxForm.action(null,{
            type:"post",
            url:"/action/sell/remove.php",
            data:{id:id},
            success:function(data){
                if(data.ok){
                    location.reload();
                }else if(data.msg){
                    alert(data.msg);
                }
            },
            error:function(){
                alert("服务器错误");
            }
        });
    };
</script>
</body>
</html>