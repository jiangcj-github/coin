<script> if(!isLogin) location.href="/web/login/signin.php"; </script>
<?php if(!$isLogin) die("用户未登录"); ?>
<div class="left">
    <div class="ul">
        <a href="/web/iframe_userhome/usered.php" ><i class="icon usered"></i>个人中心</a>
        <a href="javascript:void(0);" ><i class="icon member"></i>会员中心</a>
        <a href="javascript:void(0);" ><i class="icon id"></i>实名认证</a>
        <a href="javascript:void(0);" ><i class="icon buy"></i>我的买单</a>
        <a href="javascript:void(0);" ><i class="icon sell"></i>我的卖单</a>
        <a href="msg.php" ><i class="icon msg"></i>消息</a>
        <a href="javascript:void(0);"><i class="icon notice"></i>公告<label>3</label></a>
    </div>
</div>
<script> var login=<?php echo json_encode($_SESSION["login"]) ?>;</script>
<script src="js/left.js"></script>
