var msg={};
msg.widges={
    selectAll:$("#selectAll"),
    removeBtn:$("#remove"),
    checkNum:$("#checkNum"),
    pgBefore:$("#pg-before"),
    pgNext:$("#pg-next"),
    li:function(){
        return $(".s1>.li");
    }
};
msg.checkArr=[];
msg.log=function(text){
    alert(text);
};
msg.init=function(){
    var _this=this;
    _this.initLi();
    _this.widges.selectAll.click(function(){
        _this.widges.li().each(function(){
            _this.checkli(this);
        })
    });
};
msg.checkli=function(li){
    var _this=this;
    var id=$(li).data("id");
    $(li).addClass("check");
    _this.checkArr.pushUnique(id);
    _this.widges.checkNum.text(_this.checkArr.length);
};
msg.uncheckli=function(li){
    var _this=this;
    var id=$(li).data("id");
    $(li).removeClass("check");
    _this.checkArr.remove(id);
    _this.widges.checkNum.text(_this.checkArr.length);
};
msg.initLi=function(){
    var _this=this;
    _this.widges.li().click(function(){
        if($(this).hasClass("check")){
            _this.uncheckli(this);
        }else{
           _this.checkli(this);
        }
    });
};
msg.curPage=0;
msg.totalPage=Math.ceil(totalMsg/10);
msg.dataBuffer=[];
msg.nextPage=function(n){
    var _this=this;
    if(_this.curPage<=1||_this.curPage>=_this.totalPage){
        return;
    }
    ajaxForm.action(_this.widges.pgNext,{

    });
};
msg.init();

//扩展Array
Array.prototype.remove = function(s) {
    for (var i = 0; i < this.length; i++) {
        if (s == this[i]){
            this.splice(i, 1);
            i--;
        }
    }
};
Array.prototype.pushUnique=function(s){
    for (var i = 0; i < this.length; i++) {
        if (s == this[i]) return;
    }
    this.push(s);
};