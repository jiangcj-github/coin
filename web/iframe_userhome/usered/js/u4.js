var u4={};
u4.inputs={
    fullname:$("#fullname"),
    idcard:$("#idcard"),
    submitBtn:$("#submit")
};
u4.init=function(){
    var _this=this;
    _this.inputs.submitBtn.click(function(){
        _this.send();
    });
};
u4.log=function(msg){
    alert(msg);
};
u4.send=function(){
    var _this=this;
    var fullname=_this.inputs.fullname.val();
    var idcard=_this.inputs.idcard.val();
    if(!/^[\u4E00-\u9FA5A-Za-z]+$/.test(fullname)){
        _this.log("姓名不正确");
        return;
    }
    if(!IdCodeValid(idcard)){
        _this.log("身份证号码不正确");
        return;
    }
    ajaxForm.action(_this.inputs.checkBtn,{
        type:"get",
        url:"/action/usered/u4.php",
        data:{fullname:fullname,idcard:idcard},
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
u4.init();