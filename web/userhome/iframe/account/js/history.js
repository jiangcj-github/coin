var history={};
history.init=function(){
    var _this=this;
    ajaxForm.action(null,{
        type:"get",
        url:"/action/account/history.php",
        success:function(data){
            if(data.ok){
                _this.draw(data.data);
            }else if(data.msg){
                _this.log(data.msg)
            }else{
                _this.log("服务器出错");
            }
        },
        error:function(){
            _this.log("请求超时，刷新页面重试");
        }
    })
};
history.log=function(msg){
    $(".loading").addClass("fail").text(msg);
};
history.draw=function(data){
    var _this=this;
    $(".loading").remove();
    var his=$("#his");
    for(var i=0;i<data.length;i++){
        var li=template("tpl-li",{data:data[i]});
        his.append(li);
    }
};
history.init();
