<?php
    require_once("../../../../global/config.php");
    require_once("../../../../global/TimeUtil.php");
    include("../../../../global/checkLogin.php");

    $vid=$_SESSION["login"]["id"];
    //数据库操作
    $conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
    $conn->set_charset("utf8");
    //查询ads
    $stmt=$conn->prepare("select id,flag,coin,price,method,minNum,maxNum,time from ads where vid=? order by time desc");
    $stmt->bind_param("i",$vid);
    $stmt->execute();
    $result=$stmt->get_result();
    $ads=$result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的广告-淘币客</title>
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
            <div class="head">
                <a href="/web/userhome/iframe/ad/u1.php">发布广告</a>
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
                        <tr> <th>发布时间</th><th>类型</th><th>虚拟货币</th><th>期望价格(CNY)</th><th>交易方式</th><th>最小限额</th><th>最大限额</th><th></th></tr>
                    </thead>
                    <tbody>
                        <?php foreach($ads as $k=>$v){ ?>
                            <tr>
                                <td><?php echo time_tran($v["time"]) ?></td>
                                <td><?php echo $v["flag"]?"卖出":"买入" ?></td>
                                <td><?php echo $v["coin"] ?></td>
                                <td><?php echo $v["price"] ?></td>
                                <td><?php echo $v["method"] ?></td>
                                <td><?php echo $v["minNum"] ?></td>
                                <td><?php echo $v["maxNum"] ?></td>
                                <td>
                                    <a href="/web/userhome/iframe/ad/u1.php?id=<?php echo $v["id"] ?>" title="设置" class="edit"></a>
                                    <a href="javascript:void(0);" title="删除" class="del" onclick="remove('<?php echo $v["id"] ?>');"></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php if(count($ads)<=0){ ?>
                    <div class="no-record">暂无数据</div>
                <?php } ?>
            </div>
            <div class="s2">
                <div class="para">关于广告：</div>
                <div class="para">1.&nbsp;您必须先<a href="/web/userhome/iframe/usered/u3.php">验证手机</a>，并且完成<a href="/web/userhome/iframe/usered/u4.php">实名认证</a>，才能发布广告。</div>
                <div class="para">2.&nbsp;发布广告时您可以选择更多币种，广告的交易流程不会经过平台，平台无法保证您的资金安全，请谨慎交易。<a href="#">详细</a></div>
                <div class="para">3.&nbsp;注册用户每个月有100次免费发布广告的机会，<a href="#">升级会员</a>会获得更多的次数。</div>
            </div>
        </div>
    </div>
    <?php include("../../../layout/footer.php") ?>
</div>
<script>left.activeItem("ad");</script>
<script>
    var remove=function(id){
        if(!confirm("该操作不可恢复，确定要删除吗？")){
            return 0;
        }
        ajaxForm.action(null,{
           type:"post",
            url:"/action/ad/remove.php",
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