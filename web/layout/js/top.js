var top={};
top.widges={
    msgul:$("#msg-ul"),
    msgNum:$("#top_msgNum"),
    msgDrop:$("#msg_drop"),
    msgBadge:$("#top_msgBadge")
};
top.init=function(){
    var _this=this;
    _this.msgUpdate(function(){
        _this.uiMsg();
    });
    if(isLogin){
        _this.queryMsg();
    }
};
top.msgBuffer=[];
top.queryMsg=function(){
    var _this=this;
    ajaxForm.action(null,{
        type:"get",
        url:"/action/msg/queryUnread.php",
        success:function(data){
            if(data.ok){
                _this.msgBuffer=data.data;
                for(var n=0;n<_this.msgUpdateCall.length;n++){
                    _this.msgUpdateCall[n](_this.msgBuffer);
                }
            }
        }
    });
    setTimeout(_this.queryMsg,5000);
};
top.msgUpdateCall=[];
top.msgUpdate=function(func){
    var _this=this;
    _this.msgUpdateCall.push(func);
};
top.uiMsg=function(){
    var _this=this;
    _this.widges.msgul.empty();
    var data=_this.msgBuffer;
    for(var i=0;i<data.length&&i<5;i++){
        var li=template("tpl-msgli",{data:data[i]});
        _this.widges.msgul.append(li);
    }
    _this.widges.msgNum.text(data.length);
    _this.widges.msgBadge.text(data.length);
    if(data.length<=0){
        _this.widges.msgDrop.addClass("hide");
        _this.widges.msgBadge.addClass("hide");
    }else{
        _this.widges.msgDrop.removeClass("hide");
        _this.widges.msgBadge.removeClass("hide");
    }
};
top.init();
