var u5={};
u5.inputs={
    ac_pass1:$("#ac_pass1"),
    ac_pass2:$("#ac_pass2"),
    ac_pass3:$("#ac_pass3"),
    submitBtn:$("#submit")
};
u5.init=function(){
    var _this=this;
    _this.inputs.submitBtn.click(function(){
        if(isModify){
            _this.modify();
        }else{
            _this.send();
        }
    });
};
u5.log=function(msg){
    alert(msg);
};
u5.send=function(){
    var _this=this;
    var ac_pass2=_this.inputs.ac_pass2.val();
    var ac_pass3=_this.inputs.ac_pass3.val();
    if(!/^[0-9a-zA-Z._-]{6,15}$/.test(ac_pass2)){
        _this.log("密码不符合规范");
        return;
    }
    if(ac_pass2!=ac_pass3){
        _this.log("密码输入不一致");
        return;
    }
    ajaxForm.action(_this.inputs.submitBtn,{
        type:"post",
        url:"/action/usered/u5.php",
        data:{ac_pass2:ac_pass2},
        success:function(data){
            if(data.ok){
                location.href="/web/userhome/iframe/usered/usered.php";
            }else if(data.msg){
                _this.log(data.msg);
            }
        }
    });
};
u5.modify=function(){
    var _this=this;
    var ac_pass1=_this.inputs.ac_pass1.val();
    var ac_pass2=_this.inputs.ac_pass2.val();
    var ac_pass3=_this.inputs.ac_pass3.val();
    if(!ac_pass1){
        _this.log("资金密码不正确");
        return;
    }
    if(!/^[0-9a-zA-Z._-]{6,15}$/.test(ac_pass2)){
        _this.log("密码不符合规范");
        return;
    }
    if(ac_pass2!=ac_pass3){
        _this.log("密码输入不一致");
        return;
    }
    ajaxForm.action(_this.inputs.submitBtn,{
        type:"post",
        url:"/action/usered/u5_m.php",
        data:{ac_pass1:ac_pass1,ac_pass2:ac_pass2},
        success:function(data){
            if(data.ok){
                location.href="/web/userhome/iframe/usered/usered.php";
            }else if(data.msg){
                _this.log(data.msg);
            }
        }
    });
};
u5.init();

