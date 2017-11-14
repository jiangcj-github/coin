var u3={};
u3.inputs={
    phone:$("#phone"),
    check:$("#check"),
    checkBtn:$("#check_send"),
    submitBtn:$("#submit")
};
u3.init=function(){
    var _this=this;
    _this.inputs.checkBtn.click(function(){
        _this.sendCheck();
    });
    _this.inputs.submitBtn.click(function(){
        _this.send();
    });
};
u3.log=function(msg){
    alert(msg);
};
u3.sendCheck=function(){
    var _this=this;
    var phone=_this.inputs.phone.val();
    if(!/^1[0-9]{10}$/.test(phone)){
        _this.log("手机号格式不正确");
        return;
    }
    ajaxForm.action(_this.inputs.checkBtn,{
        type:"get",
        url:"/action/usered/checkPhone.php",
        data:{phone:phone},
        success:function(data){
            if(data.ok){
                setTimeout(scTimeout,0,120);
            }else if(data.msg){
                _this.log(data.msg);
            }
        },
        error:function(){
            _this.log("服务器出错");
        }
    });
};
var scTimeout=function(sec){
    if(sec==0){
        $(u3.inputs.checkBtn).attr("disabled",false).text("发送验证码");
    }else{
        $(u3.inputs.checkBtn).attr("disabled",true).text("发送成功("+sec+")");
        setTimeout(scTimeout,1000,sec-1);
    }
};
u3.send=function(){
    var _this=this;
    var phone=_this.inputs.phone.val();
    var code=_this.inputs.check.val();
    if(!/^1[0-9]{10}$/.test(phone)){
        _this.log("手机号格式不正确");
        return;
    }
    if(!/^[0-9]{6}$/.test(code)){
        _this.log("验证码不正确");
        return;
    }
    ajaxForm.action(_this.inputs.checkBtn,{
        type:"get",
        url:"/action/usered/u3.php",
        data:{phone:phone,code:code},
        success:function(data){
            if(data.ok){
                location.href="/web/iframe_userhome/usered.php";
            }else if(data.msg){
                _this.log(data.msg);
            }
        },
        error:function(){
            _this.log("服务器出错");
        }
    });
};
u3.init();