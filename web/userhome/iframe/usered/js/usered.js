var usered={};
usered.widge={
    pub:$("#pub")
};
usered.log=function(msg){
    alert(msg);
};
usered.init=function(){
    var _this=this;
    _this.widge.pub.click(function(){
        _this.widge.pub.toggleClass("show");
        _this.sendPub2();
    });
    _this.drawPub2();
};
usered.drawPub2=function(){
    var _this=this;
    if(_this.widge.pub.hasClass("show")){
        _this.widge.pub.text("已公开");
    }else{
        _this.widge.pub.text("已隐藏");
    }
};
usered.sendPub2=function(){
    var _this=this;
    var ispub2=0;
    if(_this.widge.pub.hasClass("show")){
        ispub2=1;
    }else{
        ispub2=0;
    }
    ajaxForm.action(_this.widge.pub,{
        type:"post",
        url:"/action/usered/setPub2.php",
        data:{ispub2:ispub2},
        success:function(data){
            if(data.ok){
                _this.drawPub2();
            }
        }
    })
};
usered.init();