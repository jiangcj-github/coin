var u1={};
u1.inputs={
    sex:$("#sex"),
    age:$("#age"),
    province:$("#province"),
    city:$("#city"),
    qq:$("#qq"),
    wx:$("#wx"),
    ispub:$("#ispub"),
    submitBtn:$("#submit")
};
u1.init=function(){
    var _this=this;
    _this.inputs.submitBtn.click(function(){
       _this.send();
    });
};
u1.log=function(msg){
    alert(msg);
};
u1.send=function(){
    var _this=this;
    var sex=_this.inputs.sex.val();
    var age=parseInt(_this.inputs.age.val());
    var province=_this.inputs.province.val();
    var city=_this.inputs.city.val();
    var qq=_this.inputs.qq.val();
    var wx=_this.inputs.wx.val();
    var ispub=_this.inputs.ispub.is(":checked")?1:0;
    if(sex&&sex!="男"&&sex!="女"){
        _this.log("性别不正确");
        return;
    }
    if(age&&(age<0||age>100)){
        _this.log("年龄不正确");
        return;
    }
    if(province&&!/^\S+$/.test(province)){
        _this.log("省份不正确");
        return;
    }
    if(city&&!/^\S+$/.test(city)){
        _this.log("城市不正确");
        return;
    }
    if(qq&&!/^[1-9][0-9]{4,14}$/.test(qq)){
        _this.log("QQ号不正确");
        return;
    }
    if(wx&&!/^[a-zA-Z][a-zA-Z0-9-_]{5,19}$/.test(wx)){
        _this.log("微信号不正确");
        return;
    }
    ajaxForm.action(_this.inputs.submitBtn,{
        type:"post",
        url:"/action/usered/u1.php",
        data:{sex:sex,age:age,province:province,city:city,qq:qq,wx:wx,ispub:ispub},
        success:function(data){
            if(data.ok){
                location.href="/web/userhome/iframe/usered/usered.php";
            }else if(data.msg){
                _this.log(data.msg);
            }
        }
    });
};
u1.init();