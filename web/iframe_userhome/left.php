<script> if(!isLogin) location.href="/web/login/signin.php"; </script>
<?php if(!$isLogin) die("用户未登录"); ?>
<div class="left">
    <div class="ul">
        <a href="/web/iframe_userhome/usered.php" ><i class="icon usered"></i>个人中心</a>
        <a href="javascript:void(0);" ><i class="icon member"></i>会员中心</a>
        <a href="javascript:void(0);" ><i class="icon ad"></i>发布广告</a>
        <a href="javascript:void(0);" ><i class="icon sell"></i>我的卖单</a>
        <a href="msg.php" ><i class="icon msg"></i>消息</a>
        <a href="javascript:void(0);"><i class="icon notice"></i>公告</a>
    </div>
</div>
<script> var login=<?php echo json_encode($_SESSION["login"]) ?>;</script>
<script src="/web/iframe_userhome/js/left.js"></script>
