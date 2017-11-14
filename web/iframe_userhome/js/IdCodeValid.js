/**
 * @return {boolean}
 */
var IdCodeValid=function(code){
    //身份证号合法性验证
    //支持15位和18位身份证号
    code=code.toLowerCase();
    if(code.length==15){
        if(!/^\d+$/.test(code)){
            return false;
        }
    }else if(code.length==18){
        if(!/^\d{17}[0-9x]$/.test(code)){
            return false;
        }
        //18位身份证需要验证最后一位校验位
        var factor = [ 7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2 ];
        var parity = [ 1, 0, 'x', 9, 8, 7, 6, 5, 4, 3, 2 ];
        var sum = 0;
        for (var i = 0; i < 17; i++){
            sum += parseInt(code[i]) * parseInt(factor[i]);
        }
        if(parity[sum % 11] != code[17]){
            return false;
        }
    }
    return true;
};