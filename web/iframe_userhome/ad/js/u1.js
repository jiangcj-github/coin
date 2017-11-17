//ul
var ui={};
ui.init=function(){
    //opt
    $(".opt-btn").click(function(){
        $(this).find(".select").toggle();
        return false;
    });
    $(".option").hover(function(){
        $(this).parent().find(".option").removeClass("hover");
        $(this).addClass("hover");
    }).click(function(){
        var val=$(this).text();
        $(this).parents(".opt-btn").prev("input").val(val);
    });
    $(document).click(function(){
        $(".select").hide();
    });
    $(".ratio").click(function(){
        $(this).parent(".ratio-group").find(".ratio").removeClass("on");
        $(this).addClass("on");
    });
};
ui.init();
//u1
var u1={};
u1.inputs={
    flag:$("#flag"),
    coin:$("#coin"),
    price:$("#price"),
    minNum:$("#minNum"),
    maxNum:$("#maxNum"),
    method:$("#method"),
    remake:$("#remake"),
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
    var flag=_this.inputs.flag.find(".on").data("val");
    var coin=_this.inputs.coin.val();
    var price=_this.inputs.price.val();
    var minNum=_this.inputs.minNum.val();
    var maxNum=_this.inputs.maxNum.val();
    var method=_this.inputs.method.val();
    var remake=_this.inputs.remake.val();
    if(flag!="0"&&flag!="1"){
        _this.log("请选择广告类型");
        return;
    }
    if(!/^[a-zA-Z]{2,6}$/.test(coin)){
        _this.log("货币类型不正确");
        return;
    }
    if(!price||isNaN(price)){
        _this.log("价格不正确");
        return;
    }
    if(!minNum||isNaN(minNum)){
        _this.log("最小交易量不正确");
        return;
    }
    if(!maxNum||isNaN(maxNum)){
        _this.log("最大交易量不正确");
        return;
    }
    if(!/^\S{2,6}$/.test(method)){
        _this.log("交易方式不正确");
        return;
    }
    if(remake.length>100){
        _this.log("备注不超过100个字符");
        return;
    }
    ajaxForm.action(_this.inputs.submitBtn,{
        type:"post",
        url:"/action/ad/u1.php",
        data:{flag:flag,coin:coin,price:price,minNum:minNum,maxNum:maxNum,method:method,remake:remake},
        success:function(data){
            if(data.ok){
                location.href="/web/iframe_userhome/ad.php";
            }else if(data.msg){
                _this.log(data.msg);
            }
        },
        error:function(){
            _this.log("服务器出错");
        }
    });
};
u1.init();
