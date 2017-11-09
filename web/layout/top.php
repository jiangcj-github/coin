<?php
    isset($_SESSION) or session_start();
    $isLogin=isset($_SESSION["login"]);
?>
<div class="header-wrap">
    <div class="header">
        <a href="/web/index.php" class="brand">
            <span class="img"></span>
            <span class="h1">淘币客</span>
        </a>
        <div class="menu">
            <a href="#">买入</a>
            <a href="#">卖出</a>
        </div>
        <div class="pinfo">
            <?php if(!$isLogin){ ?>
                <a href="/web/login/signin.php">登录</a>
                <a class="seq"></a>
                <a href="/web/login/signup.php">注册</a>
            <?php }else{ ?>
                <div class="pi-item drop">
                    <a href="/web/iframe_userhome/msg.php"><i class="icon notice"></i><span class="badge">2</span></a>
                    <div class="panel c1">
                        <h4 class="c1-h">有 3 条新消息</h4>
                        <a href="#" class="c1-li">自己搞混了一直<span class="time">3分钟前</span> </a>
                        <a href="#" class="c1-li">自己搞混了一直<span class="time">3分钟前</span> </a>
                    </div>
                </div>
                <div class="pi-item drop">
                    <i class="icon user"></i>lindakai<span class="icon-down"></span>
                    <div class="panel c2">
                        <a href="/web/iframe_userhome/usered.php" class="c2-li"><i class="icon userhome"></i>用户中心</a>
                        <a href="/web/login/signout.php" class="c2-li"><i class="icon logout"></i>注销</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<script>var isLogin=<?php echo $isLogin?1:0 ?>;</script>
<script src="/web/common/jquery-3.2.1.js"></script>
<script src="/web/common/common.js"></script>

