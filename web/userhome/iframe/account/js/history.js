var history={};
history.lock=1;
history.buffer=[];
history.init=function(){
    var _this=this;
    ajaxForm.action(null,{
        type:"get",
        url:"/action/account/btc/history.php",
        success:function(data){
            if(data.ok){
                _this.buffer=_this.buffer.concat(data.data);
                _this.lock--;
                if(!_this.lock) _this.draw();
            }else if(data.msg){
                _this.log(data.msg)
            }else{
                _this.log("服务器出错");
            }
        },
        error:function(){
            _this.log("请求超时，刷新页面重试");
        }
    });
};
history.log=function(msg){
    $(".loading").addClass("fail").text(msg);
};
history.draw=function(){
    var _this=this;
    //排序
    _this.buffer.sort(function(a,b){
        return a.time<b.time?-1:1;
    });
    $(".loading").remove();
    var his=$("#his");
    for(var i=0;i<_this.buffer.length;i++){
        var li=template("tpl-li",{data:_this.buffer[i]});
        his.append(li);
    }
};
history.init();
