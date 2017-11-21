var msg={};
msg.widges={
    selectAll:$("#selectAll"),
    removeBtn:$("#remove"),
    checkNum:$("#checkNum"),
    pgBefore:$("#pg-before"),
    pgNext:$("#pg-next"),
    lis:$("#lis")
};
msg.checkArr=[];
msg.log=function(text){
    alert(text);
};
msg.init=function(){
    var _this=this;
    _this.widges.selectAll.click(function(){
        _this.widges.lis.find(".li").each(function(){
            _this.checkli(this);
        })
    });
    _this.widges.pgBefore.click(function(){
        _this.pageBefore();
    });
    _this.widges.pgNext.click(function(){
        _this.pageNext();
    });
    _this.widges.removeBtn.click(function(){
        _this.remove();
    });
    _this.pageNext();
    top.msgUpdate(function(data){
        _this.msgUpdate(data);
    })
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
msg.curPage=0;
msg.totalPage=Math.ceil(totalMsg/10);
msg.dataBuffer=[];
msg.pageBefore=function(){
    var _this=this;
    if(_this.curPage<=1) return;
    _this.curPage--;
    if(_this.dataBuffer.length>(_this.curPage-1)*10){
        _this.drawLi((_this.curPage-1)*10);
        return;
    }
    ajaxForm.action(_this.widges.pgBefore,{
        type:"post",
        url:"/action/msg/query.php",
        data:{offset:(_this.curPage-1)*10},
        success:function(data){
            if(data.ok){
                for(var i=0;i<data.data.length;i++){
                    _this.dataBuffer[(_this.curPage-1)*10+i]=data.data[i];
                }
                _this.drawLi((_this.curPage-1)*10);
            }else if(data.msg){
                _this.log(data.msg);
            }
        },
        error:function(){
            _this.log("服务器出错");
        }
    });
};
msg.pageNext=function(){
    var _this=this;
    if(_this.curPage>=_this.totalPage) return;
    _this.curPage++;
    if(_this.dataBuffer.length>(_this.curPage-1)*10){
        _this.drawLi((_this.curPage-1)*10);
        return;
    }
    ajaxForm.action(_this.widges.pgNext,{
        type:"post",
        url:"/action/msg/query.php",
        data:{offset:(_this.curPage-1)*10},
        success:function(data){
            if(data.ok){
                for(var i=0;i<data.data.length;i++){
                    _this.dataBuffer[(_this.curPage-1)*10+i]=data.data[i];
                }
                _this.drawLi((_this.curPage-1)*10);
            }else if(data.msg){
                _this.log(data.msg);
            }
        },
        error:function(){
            _this.log("服务器出错");
        }
    });
};
msg.drawLi=function(n){
    var _this=this;
    _this.widges.lis.empty();
    for(var i=n;i<_this.dataBuffer.length&&i<n+10;i++){
        var li=template("tpl-li",{
            data:_this.dataBuffer[i],
            check:$.inArray(_this.dataBuffer[i].id,_this.checkArr)>=0?"check":"",
            unread:_this.dataBuffer[i].state<=1?"unread":""
        });
        li=$(li);
        li.click(function(){
            if($(this).hasClass("check")){
                _this.uncheckli(this);
            }else{
                _this.checkli(this);
            }
        });
        li.find(".ct").html(_this.dataBuffer[i]["content"]);
        _this.widges.lis.append(li);
    }
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
msg.remove=function(){
    var _this=this;
    if(_this.checkArr.length<=0) return;
    if(!confirm("删除"+_this.checkArr.length+"条消息?")) return;
    ajaxForm.action(_this.widges.removeBtn,{
        type:"post",
        url:"/action/msg/remove.php",
        data:{ids:_this.checkArr.join(",")},
        success:function(data){
            if(data.ok){
                location.reload();
            }else if(data.msg){
                _this.log(data.msg);
            }
        },
        error:function(){
            _this.log("服务器错误");
        }
    })
};
msg.msgUpdate=function(data){
    if(data.length>0){
        location.reload();
    }
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