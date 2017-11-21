var signin={};
signin.inputs={
    email:$("#email"),
    pass:$("#pass"),
    err:$(".err"),
    sendBtn:$("#signin")
};
signin.init=function(){
    var _this=this;
    _this.inputs.sendBtn.click(function(){
        _this.send();
    });
};
signin.log=function(msg){
    alert(msg);
};
signin.send=function(){
    var _this=this;
    var email=_this.inputs.email.val();
    var pass=_this.inputs.pass.val();
    ajaxForm.action(_this.inputs.sendBtn,{
        type:"post",
        url:"/action/login/signin.php",
        data:{email:email,pass:md5(pass)},
        success:function(data){
            if(data.ok){
                location.href="/web/main/index.php";
            }else if(data.msg){
                _this.inputs.err.text(data.msg);
            }else{
                _this.log("连接失败");
            }
        }
    });
};

signin.init();