var u1={};
u1.inputs={

};
u1.widges={
    cur_price:$("#wd-15m-price"),
    sell_price:$("#wd-sell-price"),
    buy_price:$("#wd-buy-price"),
    coin:$("#wd-coin"),
    num:$("#wd-num"),
    lockNum:$("#wd-lockNum"),
    availNum:$("#wd-availNum")
};
u1.log=function(msg){
    alert(msg);
};
u1.init=function(){
    var _this=this;
    _this.drawWidges();
};
u1.drawWidges=function(){
    var _this=this;
    ajaxForm.action(null,{
        type:"get",
        url:"https://blockchain.info/ticker",
        success:function(data){
            _this.widges.cur_price.text(data["CNY"]["15m"]);
            _this.widges.sell_price.text(data["CNY"]["sell"]);
            _this.widges.buy_price.text(data["CNY"]["buy"]);
        }
    })
};
u1.init();