var u5_reset={};
u5_reset.inputs={
    check:$("#check"),
    checkBtn:$("#checkBtn"),
    ac_pass2:$("#ac_pass2"),
    ac_pass3:$("#ac_pass3"),
    submitBtn:$("#submit")
};
u5_reset.init=function(){
    var _this=this;
    _this.inputs.submitBtn.click(function(){
        _this.send();
    });
    _this.inputs.checkBtn.click(function(){
       _this.sendCheckCode();
    });
};
u5_reset.log=function(msg){
    alert(msg);
};
u5_reset.send=function(){
    var _this=this;
    var ac_pass2=_this.inputs.ac_pass2.val();
    var ac_pass3=_this.inputs.ac_pass3.val();
    var check=_this.inputs.check.val();
    if(!/^[0-9a-zA-Z._-]{6,15}$/.test(ac_pass2)){
        _this.log("密码不符合规范");
        return;
    }
    if(ac_pass2!=ac_pass3){
        _this.log("密码输入不一致");
        return;
    }
    if(!/^[0-9]{6}$/.test(check)){
        _this.log("验证码不正确");
        return;
    }
    ajaxForm.action(_this.inputs.submitBtn,{
        type:"post",
        url:"/action/usered/u5_reset.php",
        data:{ac_pass2:ac_pass2,check:check},
        success:function(data){
            if(data.ok){
                location.href="/web/userhome/iframe/usered/usered.php";
            }else if(data.msg){
                _this.log(data.msg);
            }
        }
    });
};
u5_reset.sendCheckCode=function(){
    var _this=this;
    ajaxForm.action(_this.inputs.checkBtn,{
        type:"get",
        url:"/action/usered/checkPhone5.php",
        success:function(data){
            if(data.ok){
                setTimeout(scTimeout,0,120);
            }else if(data.msg){
                _this.log(data.msg);
            }
        }
    });
};

var scTimeout=function(sec){
    if(sec==0){
        $(u5_reset.inputs.checkBtn).attr("disabled",false).text("发送验证码");
    }else{
        $(u5_reset.inputs.checkBtn).attr("disabled",true).text("发送成功("+sec+")");
        setTimeout(scTimeout,1000,sec-1);
    }
};
u5_reset.init();

