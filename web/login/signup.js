var signup={};
signup.inputs={
    email:$("#email"),
    nick:$("#nick"),
    check:$("#check"),
    pass:$("#pass"),
    pass1:$("#pass1"),
    email_err:$("#email_err"),
    nick_err:$("#nick_err"),
    check_err:$("#check_err"),
    pass_err:$("#pass_err"),
    pass1_err:$("#pass1_err"),
    check_send:$("#check_send"),
    signup:$("#signup"),
    protocol:$("#protocol")
};
signup.init=function(){
    var _this=this;
    _this.inputs.email.blur(function(){
        var email=$(this).val();
        if(!/^[0-9a-zA-Z._-]+@[0-9a-zA-Z._-]+$/.test(email)){
            _this.inputs.email_err.text("邮箱格式不正确");
        }else{
            _this.inputs.email_err.text(null);
        }
    });
    _this.inputs.nick.blur(function(){
        var nick=$(this).val();
        if(!/^\S{3,15}$/.test(nick)){
            _this.inputs.nick_err.text("昵称不符合规范");
        }else{
            _this.inputs.nick_err.text(null);
        }
    });
    _this.inputs.pass.blur(function(){
        var pass=$(this).val();
        if(!/^[0-9a-zA-Z._-]{6,15}$/.test(pass)){
            _this.inputs.pass_err.text("密码不符合规范");
        }else{
            _this.inputs.pass_err.text(null);
        }
    });
    _this.inputs.pass1.blur(function(){
        var pass1=$(this).val();
        var pass=_this.inputs.pass.val();
        if(pass1!=pass){
            _this.inputs.pass1_err.text("密码输入不一致");
        }else{
            _this.inputs.pass1_err.text(null);
        }
    });

};
signup.log=function(msg){
    alert(msg);
};

signup.init();
