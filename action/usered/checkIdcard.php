<?php
// 新的18位身份证号码各位的含义:
// 1-2位省、自治区、直辖市代码；    11-65
// 3-4位地级市、盟、自治州代码；
// 5-6位县、县级市、区代码；
// 7-14位出生年月日，比如19670401代表1967年4月1日；
// 15-17位为顺序号，其中17位男为单数，女为双数；
// 18位为校验码，0-9和X，由公式随机产生。
// 举例：
// 130503 19670401 0012这个身份证号的含义: 13为河北，05为邢台，03为桥西区，出生日期为1967年4月1日，顺序号为001，2为验证码。

// 15位身份证号码各位的含义:
// 1-2位省、自治区、直辖市代码；
// 3-4位地级市、盟、自治州代码；
// 5-6位县、县级市、区代码；
// 7-12位出生年月日,比如670401代表1967年4月1日,这是和18位号码的第一个区别；
// 13-15位为顺序号，其中15位男为单数，女为双数；
// 与18位身份证号的第二个区别：没有最后一位的验证码。
// 举例：
// 130503 670401 001的含义; 13为河北，05为邢台，03为桥西区，出生日期为1967年4月1日，顺序号为001。

function checkIdentity($num){
    $num=strtolower($num);
    if(strlen($num) == 15){
        if(!is_numeric($num)){
            return false;
        }
        $areaNum = substr($num,0,6);
        $dateNum = substr($num,6,6);
    }else if(strlen($num) == 18){
        if(!is_numeric(substr($num,0,17))){
            return false;
        }
        $areaNum = substr($num,0,6);
        $dateNum = substr($num,6,8);
        $endNum = substr($num,17,1);
        if(!checkEnd_Id($endNum,$num)){
            return false;
        }
    }else{
        return false;
    }
    if(!checkArea_Id($areaNum)){
        return false;
    }
    if(!checkDate_Id($dateNum)){
        return false;
    }
    return true;
}
// 验证城市
function checkArea_Id($area){
    $num1 = substr($area,0,2);
    $num2 = substr($area,2,2);
    $num3 = substr($area,4,2);
    if($num1<=10||$num1>=66){
        return false;
    }
    return true;
}
// 验证出生日期
function checkDate_Id($date){
     if (strlen($date) == 6) {
         $date1 = "19" . substr($date, 0, 2);
         $date2 = substr($date, 2, 2);
         $date3 = substr($date, 4, 2);
     } else {
         $date1 = substr($date, 0, 4);
         $date2 = substr($date, 4, 2);
         $date3 = substr($date, 6, 2);
     }
     if ($date1 . $date2 . $date3 >= date("Ymd") || $date1 . $date2 . $date3 <= "19900101") {
         return false;
     }
     if ($date2 < "01" || $date2 > "12") {
         return false;
     }
     if ($date2 == "01" || $date2 == "03" || $date2 == "05" || $date2 == "07" || $date2 == "08" || $date2 == "10" || $date2 == "12") {
         if ($date3 < "01" || $date3 > "31") {
             return false;
         }
     } else if ($date2 == "04" || $date2 == "06" || $date2 == "09" || $date2 == "11") {
         if ($date3 < "01" || $date3 > "30") {
             return false;
         }
     } else {
         $y = (int)$date1;
         if (($y % 4 == 0 && $y % 100 != 0) || $y % 400 == 0) {
             if ($date3 < "01" || $date3 > "29") {
                 return false;
             }
         } else {
             if ($date3 < "01" || $date3 > "28") {
                 return false;
             }
         }
     }
     return true;
 }
// 验证18位身份证最后一位
function checkEnd_Id($end,$num){
    $checkHou = array(1,0,'x',9,8,7,6,5,4,3,2);
    $checkGu = array(7,9,10,5,8,4,2,1,6,3,7,9,10,5,8,4,2);
    $sum = 0;
    for($i = 0;$i < 17; $i++){
        $sum +=$checkGu[$i] * $num[$i];
    }
    $check= $sum % 11;
    if($checkHou[$check] != $num[17]){
        return false;
    }
    return true;
}
