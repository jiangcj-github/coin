var btc_in={};
btc_in.widges={
    btcNum:$("#btcNum"),
    btcLock:$("#btcLock"),
    btcAvail:$("#btcAvail"),
    addr:$(".c3"),
    qrcode:$(".c4")
};
btc_in.init=function(){
    var _this=this;
    _this.btcCheck();
    _this.makeQrcode();
};
btc_in.btcCheck=function(){
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
btc_in.makeQrcode=function(){
    var _this=this;
    var addr=_this.widges.addr.text();
    var qr=new QRCode(_this.widges.qrcode[0],{
        width: 80,
        height: 80
    });
    qr.makeCode(addr);
};
btc_in.init();
