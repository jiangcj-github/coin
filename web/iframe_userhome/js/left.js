var left={};
left.items={
    usered:$(".left i.usered").parent("a"),
    member:$(".left i.member").parent("a"),
    ad:$(".left i.ad").parent("a"),
    sell:$(".left i.sell").parent("a"),
    msg:$(".left i.msg").parent("a"),
    notice:$(".left i.notice").parent("a"),
    msgLabel:$("#left_msgL")
};
left.init=function(){
    var _this=this;
    top.msgUpdate(function(data){
        _this.msgUpdate(data);
    });

};
left.activeItem=function(iname){
    var ul=$(".left .ul");
    ul.find("a.active").removeClass("active");
    var _this=this;
    switch(iname){
        case "usered":
            _this.items.usered.addClass("active");
            break;
        case "member":
            _this.items.member.addClass("active");
            break;
        case "ad":
            _this.items.ad.addClass("active");
            break;
        case "sell":
            _this.items.sell.addClass("active");
            break;
        case "msg":
            _this.items.msg.addClass("active");
            break;
        case "notice":
            _this.items.notice.addClass("active");
            break;
        default:
            break;
    }
};
left.msgUpdate=function(data){
    var _this=this;
    _this.items.msgLabel.text(data.length);
    if(data.length<=0){
        _this.items.msgLabel.addClass("hide");
    }else{
        _this.items.msgLabel.removeClass("hide");
    }
};
left.init();