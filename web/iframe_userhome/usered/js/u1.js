var u1={};
u1.inputs={
    sexInput:$("#sex"),
    ageInput:$("#age"),
    provinceInput:$("#province"),
    cityInput:$("#city"),
    qqInput:$("#qq"),
    wxInput:$("#wx"),
    submitBtn:$("#submit")
};
u1.init=function(){
    var _this=this;
    _this.inputs.submitBtn.click(function(){
       _this.send();
    });
    //加载数据
    ajaxForm.action(null,{
        type:"get",
        url:"/action/usered/getUserInfo.php",
        success:function(data){
            if(data.ok){
                _this.inputs.sexInput.val(data.data.sex);
                _this.inputs.ageInput.val(data.data.age);
                _this.inputs.provinceInput.val(data.data.province).trigger("change");
                _this.inputs.cityInput.val(data.data.city);
                _this.inputs.qqInput.val(data.data.qq);
                _this.inputs.wxInput.val(data.data.wx);
            }
        }
    })

};
u1.log=function(msg){
    alert(msg);
};
u1.send=function(){
    var _this=this;
    var sex=_this.inputs.sexInput.val();
    var age=parseInt(_this.inputs.ageInput.val());
    var province=_this.inputs.provinceInput.val();
    var city=_this.inputs.cityInput.val();
    var qq=_this.inputs.qqInput.val();
    var wx=_this.inputs.wxInput.val();
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
        data:{sex:sex,age:age,province:province,city:city,qq:qq,wx:wx},
        success:function(data){
            if(data.ok){
                location.href="/web/iframe_userhome/usered.php";
            }else if(data.msg){
                _this.log(data.msg);
            }
        }
    });
};
u1.init();