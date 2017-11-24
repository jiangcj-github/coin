var notice={};
notice.widges={
    lis:$(".s1").find(".li"),
    pgBefore:$("#pg-before"),
    pgNext:$("#pg-next")
};
notice.log=function(text){
    alert(text);
};
notice.init=function(){
    var _this=this;
    _this.widges.pgBefore.click(function(){
        _this.pageBefore();
    });
    _this.widges.pgNext.click(function(){
        _this.pageNext();
    });
    _this.pageNext();
};
notice.curPage=0;
notice.totalPage=Math.ceil(noticeNum/10);
notice.pageBefore=function(){
    var _this=this;
    if(_this.curPage<=1) return;
    _this.curPage--;
    _this.widges.lis.removeClass("show");
    _this.widges.lis.slice((_this.curPage-1)*10,_this.curPage*10).addClass("show");
    //禁用状态
    if(_this.curPage<=1){
        _this.widges.pgBefore.addClass("disabled");
    }else{
        _this.widges.pgBefore.removeClass("disabled");
    }
    if(_this.curPage>=_this.totalPage){
        _this.widges.pgNext.addClass("disabled");
    }else{
        _this.widges.pgNext.removeClass("disabled");
    }

};
notice.pageNext=function(){
    var _this=this;
    if(_this.curPage>=_this.totalPage) return;
    _this.curPage++;
    _this.widges.lis.removeClass("show");
    _this.widges.lis.slice((_this.curPage-1)*10,_this.curPage*10).addClass("show");
    //禁用状态
    if(_this.curPage<=1){
        _this.widges.pgBefore.addClass("disabled");
    }else{
        _this.widges.pgBefore.removeClass("disabled");
    }
    if(_this.curPage>=_this.totalPage){
        _this.widges.pgNext.addClass("disabled");
    }else{
        _this.widges.pgNext.removeClass("disabled");
    }
};
notice.init();