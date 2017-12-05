<?php
    isset($_SESSION) or session_start();
    $isLogin=isset($_SESSION["login"]);
?>
<div class="header-wrap">
    <div class="header">
        <a href="/web/main/index.php" class="brand">
            <span class="img"></span>
            <span class="h1">淘币客</span>
        </a>
        <div class="menu">
            <a href="/web/userhome/iframe/ad/u1.php">发布广告</a>
            <a href="/web/userhome/iframe/sell/u1_btc.php">出售货币</a>
        </div>
        <div class="rmenu">
            <a href="/web/sys/notice/notice.php"><i class="icon notice"></i>系统</a>
        </div>
        <div class="pinfo">
            <?php if(!$isLogin){ ?>
                <a href="/web/login/signin.php">登录</a>
                <a class="seq"></a>
                <a href="/web/login/signup.php">注册</a>
            <?php }else{ ?>
                <div class="pi-item drop">
                    <a href="/web/userhome/iframe/msg/msg.php"><i class="icon msg"></i><span class="badge hide" id="top_msgBadge">0</span></a>
                    <div class="panel c1 hide" id="msg_drop">
                        <h4 class="c1-h">您有 <span id="top_msgNum">0</span> 条新消息</h4>
                        <div id="msg-ul">
                            <a href="/web/userhome/iframe/msg/msg.php" class="c1-li">新消息<span class="time">3天前</span></a>
                            <a href="/web/userhome/iframe/msg/msg.php" class="c1-li">新消息<span class="time">3天前</span></a>
                            <a href="/web/userhome/iframe/msg/msg.php" class="c1-li">新消息<span class="time">3天前</span></a>
                            <a href="/web/userhome/iframe/msg/msg.php" class="c1-li">新消息<span class="time">3天前</span></a>
                            <a href="/web/userhome/iframe/msg/msg.php" class="c1-li">新消息<span class="time">3天前</span></a>
                        </div>
                        <div class="c1-fo">
                            <a href="/web/userhome/iframe/msg/msg.php">查看全部</a>
                        </div>
                    </div>
                </div>
                <div class="pi-item drop">
                    <i class="icon user"></i><?php echo $_SESSION["login"]["nick"] ?><span class="icon-down"></span>
                    <div class="panel c2">
                        <a href="/web/userhome/iframe/usered/usered.php" class="c2-li"><i class="icon userhome"></i>用户中心</a>
                        <a href="/web/userhome/iframe/account/account.php" class="c2-li"><i class="icon account"></i>我的账户</a>
                        <a href="/web/login/signout.php" class="c2-li"><i class="icon logout"></i>注销</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<script id="tpl-msgli" type="text/html">
    <a href="/web/userhome/iframe/msg/msg.php" class="c1-li">{{data.title}}<span class="time">{{data.time}}</span></a>
</script>
<script>var isLogin=<?php echo $isLogin?1:0 ?>;</script>
<script src="/web/layout/js/jquery-3.2.1.js"></script>
<script src="/web/layout/js/common.js"></script>
<script src="/web/layout/js/template-web.js"></script>
<script src="/web/layout/js/top.js"></script>
