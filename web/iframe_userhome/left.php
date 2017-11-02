<style>
    .main .left{width:200px;float:left;font-size:14px;}
    .left .ul{border-radius:3px;border:1px solid #e4e4e4;width:180px;}
    .left .ul a:first-child{border-radius:3px 3px 0 0;}
    .left .ul a:last-child{border-radius:0 0 3px 3px;}
    .left .ul a{display:flex;line-height:40px;padding-left:20px;align-items:center;position:relative;border-bottom:1px solid #f4f4f4;}
    .left .ul a.active{background:#3385ff !important;color:#fff !important;}
    .left .ul a:hover{background:#f4f4f4;transition:background 0.3s;}

    .left .ul a i.icon{display:block;width:30px;height:30px;margin-right:10px;
        background-repeat:no-repeat;background-position:center center;background-size:18px auto;}
    .left .ul a i.notice{background-image:url(/web/iframe_userhome/img/notice.svg);}
    .left .ul a.active i.notice{background-image:url(/web/iframe_userhome/img/notice1.svg);}
    .left .ul a i.msg{background-image:url(/web/iframe_userhome/img/msg.svg);}
    .left .ul a.active i.msg{background-image:url(/web/iframe_userhome/img/msg1.svg);}
    .left .ul a i.buy{background-image:url(/web/iframe_userhome/img/buy.svg);}
    .left .ul a.active i.buy{background-image:url(/web/iframe_userhome/img/buy1.svg);}
    .left .ul a i.sell{background-image:url(/web/iframe_userhome/img/sell.svg);}
    .left .ul a.active i.sell{background-image:url(/web/iframe_userhome/img/sell1.svg);}
    .left .ul a i.id{background-image:url(/web/iframe_userhome/img/id.svg);}
    .left .ul a.active i.id{background-image:url(/web/iframe_userhome/img/id1.svg);}
    .left .ul a i.usered{background-image:url(/web/iframe_userhome/img/usered.svg);}
    .left .ul a.active i.usered{background-image:url(/web/iframe_userhome/img/usered1.svg);}
    .left .ul a i.member{background-image:url(/web/iframe_userhome/img/member.svg);}
    .left .ul a.active i.member{background-image:url(/web/iframe_userhome/img/member1.svg);}

    .left .ul a label{position:absolute;right:20px;top:12px;display:block;padding:0 5px;background:green;
        font-size:12px;line-height:16px;border-radius:8px;margin-left:40px;color:#fff;font-weight:bold;}
</style>
<div class="left">
    <div class="ul">
        <a href="javascript:void(0);" class="active"><i class="icon usered"></i>个人中心</a>
        <a href="javascript:void(0);" ><i class="icon member"></i>会员中心</a>
        <a href="javascript:void(0);" ><i class="icon id"></i>实名认证</a>
        <a href="javascript:void(0);" ><i class="icon buy"></i>我的买单</a>
        <a href="javascript:void(0);" ><i class="icon sell"></i>我的卖单</a>
        <a href="javascript:void(0);" ><i class="icon msg"></i>消息</a>
        <a href="javascript:void(0);"><i class="icon notice"></i>公告<label>3</label></a>
    </div>
</div>
<script>
    ajaxForm.action(null,{
        type:"get",
        url:"/web/action/msg/queryInfo.php",
        data:{vid:1},
        success:function(data){
            if(data.ok){
                var msgNum=data.data.msgNum;
                var noticeNum=data.data.noticeNum;
                if(msgNum>0){
                    $(".left i.msg").parent("a").append("<label>"+msgNum+"</label>");
                }
                if(noticeNum>0){
                    $(".left i.notice").parent("a").append("<label>"+noticeNum+"</label>");
                }
            }
        }
    });
</script>
