var signup={};
signup.inputs={
    email:$("#email"),
    nick:$("#nick"),
    check:$("#check"),
    checkBtn:$("#checkBtn"),
    pass:$("#pass"),
    pass1:$("#pass1"),
    sendBtn:$("#sendBtn"),
    protocol:$("#protocol")
};
signup.init=function(){
    var _this=this;
    _this.inputs.checkBtn.click(function(){
        _this.sendCheckCode();
    });
    _this.inputs.sendBtn.click(function(){
        _this.send();
    });
};
signup.log=function(msg){
    alert(msg);
};
signup.sendCheckCode=function(){
    var _this=this;
    var email=_this.inputs.email.val();
    if(!/^[0-9a-zA-Z._-]+@[0-9a-zA-Z._-]+$/.test(email)){
        _this.log("邮箱格式不正确");
        return;
    }
    ajaxForm.action(_this.inputs.checkBtn,{
        type:"get",
        url:"/action/login/sendCheckCode.php",
        data:{email:email},
        success:function(data){
            if(data.ok){
                setTimeout(scTimeout,0,60);
            }else if(data.msg){
                _this.log(data.msg);
            }else{
                _this.log("发送失败");
            }
        },
        error:function(text){
            _this.log("发送失败");
        }
    });
};
var scTimeout=function(sec){
    if(sec==0){
        $(signup.inputs.checkBtn).attr("disabled",false).text("获取验证码");
    }else{
        $(signup.inputs.checkBtn).attr("disabled",true).text("发送成功("+sec+")");
        setTimeout(scTimeout,1000,sec-1);
    }
};
signup.send=function(){
    var _this=this;
    var email=_this.inputs.email.val();
    var nick=_this.inputs.nick.val();
    var pass=_this.inputs.pass.val();
    var pass1=_this.inputs.pass1.val();
    var check=_this.inputs.check.val();
    var protocol=_this.inputs.protocol.is(":checked");
    if(!protocol){
        _this.log("还未阅读并同意用户协议");
        return;
    }
    if(!/^[0-9a-zA-Z._-]+@[0-9a-zA-Z._-]+$/.test(email)){
        _this.log("邮箱格式不正确");
        return;
    }
    if(!/^\S{3,15}$/.test(nick)){
        _this.log("昵称不符合规范");
        return;
    }
    if(!/^[0-9a-zA-Z._-]{6,15}$/.test(pass)){
        _this.log("密码不符合规范");
        return;
    }
    if(pass1!=pass){
        _this.log("密码输入不一致");
        return;
    }
    ajaxForm.action(this,{
        type:"post",
        url:"/action/login/signup.php",
        data:{email:email,nick:nick,pass:pass,check:check},
        success:function(data){
            if(data.ok){
                location.href="/web/login/signin.php";
            }else if(data.msg){
                _this.log(data.msg);
            }else{
                _this.log("连接失败");
            }
        }
    })
};

signup.init();
