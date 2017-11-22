var u2={};
u2.inputs={
    pass1:$("#pass1"),
    pass2:$("#pass2"),
    pass3:$("#pass3"),
    submitBtn:$("#submit")
};
u2.init=function(){
    var _this=this;
    _this.inputs.submitBtn.click(function(){
        _this.send();
    });
};
u2.log=function(msg){
    alert(msg);
};
u2.send=function(){
    var _this=this;
    var pass1=_this.inputs.pass1.val();
    var pass2=_this.inputs.pass2.val();
    var pass3=_this.inputs.pass3.val();
    if(!/^[0-9a-zA-Z._-]{6,15}$/.test(pass2)){
        _this.log("新密码不符合规范");
        return;
    }
    if(pass3!=pass2){
        _this.log("密码输入不一致");
        return;
    }
    ajaxForm.action(this,{
        type:"post",
        url:"/action/usered/u2.php",
        data:{pass1:pass1,pass2:pass2},
        success:function(data){
            if(data.ok){
                location.href="/web/userhome/iframe/usered/usered.php";
            }else if(data.msg){
                _this.log(data.msg);
            }
        },
        error:function(){
            _this.log("服务器出错");
        }
    });
};
u2.init();