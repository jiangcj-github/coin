var reset={};
reset.inputs={
    email:$("#email"),
    check:$("#check"),
    checkBtn:$("#check_send"),
    pass:$("#pass"),
    pass1:$("#pass1"),
    sendBtn:$("#submit")
};
reset.init=function () {
    var _this=this;
    _this.inputs.checkBtn.click(function(){
        _this.sendCheckCode();
    });
    _this.inputs.sendBtn.click(function () {
        _this.send();
    })
};
reset.log=function(msg){
    alert(msg);
};
reset.sendCheckCode=function(){
    var _this=this;
    var email=_this.inputs.email.val();
    if(!/^[0-9a-zA-Z._-]+@[0-9a-zA-Z._-]+$/.test(email)){
        _this.log("邮箱格式不正确");
        return;
    }
    ajaxForm.action(_this.inputs.check_send,{
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
        $(reset.inputs.checkBtn).attr("disabled",false).text("获取验证码");
    }else{
        $(reset.inputs.checkBtn).attr("disabled",true).text("发送成功("+sec+")");
        setTimeout(scTimeout,1000,sec-1);
    }
};
reset.send=function(){
    var _this=this;
    var email=_this.inputs.email.val();
    var pass=_this.inputs.pass.val();
    var pass1=_this.inputs.pass1.val();
    var check=_this.inputs.check.val();
    if(!/^[0-9a-zA-Z._-]+@[0-9a-zA-Z._-]+$/.test(email)){
        _this.log("邮箱格式不正确");
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
        url:"/action/login/reset.php",
        data:{email:email,pass:pass,check:check},
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

reset.init();
