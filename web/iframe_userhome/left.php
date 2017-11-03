<div class="left">
    <div class="ul">
        <a href="javascript:void(0);" ><i class="icon usered"></i>个人中心</a>
        <a href="javascript:void(0);" ><i class="icon member"></i>会员中心</a>
        <a href="javascript:void(0);" ><i class="icon id"></i>实名认证</a>
        <a href="javascript:void(0);" ><i class="icon buy"></i>我的买单</a>
        <a href="javascript:void(0);" ><i class="icon sell"></i>我的卖单</a>
        <a href="msg.php" ><i class="icon msg"></i>消息</a>
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
    function activeLeft(cls){
        var ul=$(".left .ul");
        ul.find("a.active").removeClass("active");
        ul.find("i."+cls).parent("a").addClass("active");
    }
</script>
