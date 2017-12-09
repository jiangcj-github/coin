var btc_out={};
btc_out.widges={
    btcNum:$("#btcNum"),
    btcLock:$("#btcLock"),
    btcAvail:$("#btcAvail")
};
btc_out.inputs={
    addr:$("#addr"),
    num:$("#num"),
    ac_pass:$("#ac_pass"),
    check:$("#check"),
    fee:$("#fee"),
    protocol:$("#protocol"),
    sendBtn:$("#submit"),
    checkBtn:$("#checkBtn")
};
btc_out.init=function(){
    var _this=this;
    _this.btcCheck();
    _this.inputs.checkBtn.click(function(){
        _this.sendCheckCode();
    });
    _this.inputs.sendBtn.click(function(){
        _this.send();
    });
};
btc_out.btcCheck=function(){
    var _this=this;
    ajaxForm.action(null,{
        type:"get",
        url:"/action/account/btc/check.php",
        success:function(data){
            if(data.ok){
                _this.widges.btcNum.text(data.data.btcNum);
                _this.widges.btcLock.text(data.data.btcLock);
                _this.widges.btcAvail.text(data.data.btcAvail);
            }
        }
    })
};
btc_out.sendCheckCode=function(){
    var _this=this;
    ajaxForm.action(_this.inputs.checkBtn,{
        type:"get",
        url:"/action/account/checkPhone.php",
        success:function(data){
            if(data.ok){
                setTimeout(scTimeout,0,120);
            }else if(data.msg){
                _this.log(data.msg);
            }else{
                _this.log("发送失败");
            }
        }
    })
};
btc_out.log=function(msg){
    alert(msg);
};
btc_out.send=function(){
    var _this=this;
    var addr=_this.inputs.addr.val();
    var num=parseFloat(_this.inputs.num.val());
    var ac_pass=md5(_this.inputs.ac_pass.val());
    var check=_this.inputs.check.val();
    var fee=_this.inputs.fee.val();
    var protocol=_this.inputs.protocol.is(":checked");
    if(!protocol){
        _this.log("请先阅读并同意转出协议");
        return;
    }
    if(!/\S+/.test(addr)){
        _this.log("转出地址不正确");
        return;
    }
    if(isNaN(num)||num<=0){
        _this.log("转出数量不正确");
        return;
    }
    if(!/[0-9]{6}/.test(check)){
        _this.log("验证码不正确");
        return;
    }
    ajaxForm.action(_this.inputs.sendBtn,{
        type:"post",
        url:"/action/account/btc/btc_out.php",
        data:{addr:addr,num:num,ac_pass:ac_pass,check:check,fee:fee},
        success:function(data){
            if(data.ok){
                location.href="/web/userhome/iframe/account/account.php";
            }else if(data.msg){
                _this.log(data.msg);
            }else{
                _this.log("服务器错误");
            }
        }
    });
};
btc_out.init();

var scTimeout=function(sec){
    if(sec==0){
        $(btc_out.inputs.checkBtn).attr("disabled",false).text("发送验证码");
    }else{
        $(btc_out.inputs.checkBtn).attr("disabled",true).text("发送成功("+sec+")");
        setTimeout(scTimeout,1000,sec-1);
    }
};
