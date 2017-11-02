<?php
    isset($_SESSION) or session_start();
    $isLogin=isset($_SESSION["login"]);
?>
<link rel="stylesheet" type="text/css" href="/web/common/css/theme.css">
<style>
    .header-wrap{height:50px;background:#3c404d;}
    .header{height:100%;width:1080px;margin:0 auto;display:flex;align-items:center;font-size:16px;}
    .header a{color:#ddd;}
    .header  .brand{font-size:20px;display:inline-table;line-height:50px;padding:0 20px;margin-right:20px;}

    .header .menu{flex-grow:1;}
    .header .menu>a{display:inline-table;line-height:50px;padding:0 10px;}
    .header .menu>a:hover{color:#fff;}

    .header .pinfo{height:100%;}
    .header .pinfo>a{display:inline-flex;justify-content:center;align-items:center;font-size:12px;line-height:50px;padding:0 10px;position:relative;}
    .header .pinfo>a.seq{padding:0;margin:0 -5px;}
    .header .pinfo>a.seq:before{content:"|";}

    .header .pinfo .pi-item{color:#ddd;line-height:50px;font-size:12px;position:relative;padding:0 10px;cursor:pointer;
        display:inline-flex;justify-content:center;align-items:center;}
    .header .pi-item .icon{background-repeat:no-repeat;background-position:center center;background-size:24px 24px;
        display:block;width:30px;height:50px;margin-right:2px;}
    .header .pi-item .user{background-image:url(/web/common/img/user.svg);}
    .header .pi-item .notice{background-image:url(/web/common/img/notice.svg);}
    .header .pi-item .badge{background:#ff7519;line-height:16px;height:16px;min-width:6px;font-size:12px;
        color:#fff !important;border-radius:16px;padding:0 5px;position:absolute;top:13px;left:27px;}

    .header .pinfo .drop{line-height:20px;display:inline-flex;}
    .header .pinfo .drop .icon-down{display:block;width:0;height:0;border:4px solid transparent;border-top:4px solid #ff7519;margin:7px 0 0 3px;}
    .header .pinfo .drop .panel{background:#fff;position:absolute;top:54px;box-shadow:0 1px 4px rgba(0,0,0,0.4);border-radius:3px;display:none;}
    .header .pinfo .drop .panel:before{content:"";display:block;width:0;height:0;position:absolute;left:50%;margin-left:-10px;top:-22px;
        border:10px solid transparent;border-bottom:12px solid #f0ad4e;}
    .header .drop .c1{width:200px;color:#444;cursor:default;}
    .header .drop .c1 .c1-h{margin:0;line-height:32px;text-indent:10px;font-weight:normal;
        border-bottom:1px solid #e4e4e4;color:#fff;background:#f0ad4e;border-radius:3px 3px 0 0;}
    .header .drop .c1 .c1-li{display:block;line-height:24px;padding:5px 10px;color:#444;border-bottom:1px solid #f6f6f6;}
    .header .drop .c1 .c1-li .time{display:block;text-align:right;line-height:16px;font-size:12px;color:#666;}
    .header .drop .c1 .c1-li:hover{background:#f4f4f4;transition:background 0.3s;}
    .header .drop .c1 .c1-li:last-child{border-radius:0 0 3px 3px;}
    .header .drop .c2{width:140px;padding:2px 0;}
    .header .drop .c2:before{border-bottom-color:#fff !important;}
    .header .drop .c2 .c2-li{display:flex;align-items:center;height:34px;padding:0 10px;border-bottom:1px solid #f6f6f6;color:#444;}
    .header .drop .c2 .c2-li:hover{background:#f4f4f4;transition:background 0.3s;}
    .header .drop .c2 .c2-li .icon{background-size:16px 16px;height:30px;}
    .header .drop .c2 .userhome{background-image:url(/web/common/img/userhome.svg);}
    .header .drop .c2 .logout{background-image:url(/web/common/img/logout.svg);}
</style>
<div class="header-wrap">
    <div class="header">
        <a href="#" class="brand">coinbee</a>
        <div class="menu">
            <a href="#">买入</a>
            <a href="#">卖出</a>
        </div>
        <div class="pinfo">
            <?php if(!$isLogin){ ?>
                <a href="#">登录</a>
                <a class="seq"></a>
                <a href="#">注册</a>
            <?php }else{ ?>
                <div class="pi-item drop">
                    <i class="icon notice"></i> <span class="badge">2</span>
                    <div class="panel c1">
                        <h4 class="c1-h">有 3 条新消息</h4>
                        <a href="#" class="c1-li">自己搞混了一直<span class="time">3分钟前</span> </a>
                        <a href="#" class="c1-li">自己搞混了一直<span class="time">3分钟前</span> </a>
                    </div>
                </div>
                <div class="pi-item drop">
                    <i class="icon user"></i>lindakai<span class="icon-down"></span>
                    <div class="panel c2">
                        <a href="#" class="c2-li"><i class="icon userhome"></i>用户中心</a>
                        <a href="#" class="c2-li"><i class="icon logout"></i>注销</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<script src="/web/common/jquery-3.2.1.js"></script>
<script src="/web/common/common.js"></script>

