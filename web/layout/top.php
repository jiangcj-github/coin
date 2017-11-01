<?php
    session_start();
    $isLogin=isset($_SESSION["login"]);
?>
<link rel="stylesheet" type="text/css" href="/web/css/theme.css">
<style>
    .header-wrap{height:50px;background:#3c404d;}
    .header{height:100%;width:1080px;margin:0 auto;display:flex;align-items:center;font-size:16px;}
    .header a{color:#ddd;}
    .header  .brand{font-size:20px;display:inline-table;line-height:50px;padding:0 20px;margin-right:20px;}
    .header .menu{flex-grow:1;}
    .header .menu a{display:inline-table;line-height:50px;padding:0 10px;}
    .header .menu a:hover{color:#fff;}
    .header .pinfo{height:100%;}
    .header .pinfo a{display:inline-flex;justify-content:center;align-items:center;font-size:12px;line-height:50px;padding:0 10px;position:relative;}
    .header .pinfo a:hover{color:#fff;}
    .header .pinfo a.seq{padding:0;margin:0 -5px;}
    .header .pinfo a.seq:before{content:"|";}
    .header .pinfo i.icon{background-repeat:no-repeat;background-position:center center;background-size:24px 24px;
        display:block;width:30px;height:50px;margin-right:2px;}
    .header .pinfo i.icon.user{background-image:url(../img/user.svg);}
    .header .pinfo i.icon.notice{background-image:url(../img/notice.svg);}
    .header .pinfo a .down-icon{display:block;width:0;height:0;border:4px solid transparent;border-top:4px solid #ddd;margin:7px 0 0 3px;}

    .header .pinfo a .menu{width:200px;height:200px;background:#fff;position:absolute;top:50px;border:1px solid #ccc;
        box-shadow:2px 2px 5px #ccc;border-radius:3px;display:none;}
    .header .pinfo a .menu:before{content:"";display:block;width:0;height:0;position:absolute;left:50%;margin-left:-10px;top:-22px;
        border:10px solid transparent;border-bottom:12px solid #fff;}
</style>
<div class="header-wrap">
    <div class="header">
        <a href="#" class="brand">coinbee</a>
        <div class="menu">
            <a href="#">买入</a>
            <a href="#">卖出</a>
        </div>
        <?php if(!$isLogin){ ?>
            <div class="pinfo">
            <a href="#">登录</a>
            <a class="seq"></a>
            <a href="#">注册</a>
        </div>
        <?php }else{ ?>
            <div class="pinfo">
                <a href="#" class="drop">
                    <i class="icon notice"></i>消息(2)<span class="down-icon"></span>
                    <div class="menu">

                    </div>
                </a>

                <a href="#" class="drop">
                    <i class="icon user"></i>lindakai<span class="down-icon"></span>
                    <div class="menu">

                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</div>