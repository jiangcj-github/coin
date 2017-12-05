var account={};
account.widges={
    btcNum:$("#btcNum"),
    btcLock:$("#btcLock"),
    btcAvail:$("#btcAvail")
};
account.init=function(){
    var _this=this;
    _this.btcCheck();
};
account.btcCheck=function(){
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
account.init();
