<?php

class btc{
    //
    private $guid="8f074def-2254-4cd1-bb81-705a44cf34f6";
    private $main_password="tbk_bit_2017";
    private $second_password="20090928jcj";

    function newAccount($label){
        $guid=$this->guid;
        $pass1=$this->main_password;
        $pass2=$this->second_password;
        $url = "http://localhost:3000/merchant/$guid/accounts/create?password=$pass1&second_password=$pass2&label=$label";
        $req=file_get_contents($url);
        if(!$req) die();
        $data=json_decode($req);
        return $data->xpub;
    }

    function checkAccount($xpub){
        $guid=$this->guid;
        $pass1=$this->main_password;
        $url = "http://localhost:3000/merchant/$guid/accounts/$xpub/balance?password=$pass1";
        $req=file_get_contents($url);
        if(!$req) die();
        $data=json_decode($req);
        return $data->balance;
    }

    function getAddr($xpub){
        $guid=$this->guid;
        $pass1=$this->main_password;
        $url = "http://localhost:3000/merchant/$guid/accounts/$xpub/receiveAddress?password=$pass1";
        $req=file_get_contents($url);
        if(!$req) die();
        $data=json_decode($req);
        return $data->address;
    }

    function pay($fromAddr,$toAddr,$num){
        $num=$num*100000000;
        $guid=$this->guid;
        $pass1=$this->main_password;
        $pass2=$this->second_password;
        $url="http://localhost:3000/merchant/$guid/payment?password=$pass1&second_password=$pass2&to=$toAddr&amount=$num&from=$fromAddr";
        $req=file_get_contents($url);
        if(!$req) die();
        $data=json_decode($req);
        return $data;
    }

    function payMany($fromAddr,$toAddr1,$num1,$toAddr2,$num2){
        $num1=$num1*100000000;
        $num2=$num2*100000000;
        $guid=$this->guid;
        $pass1=$this->main_password;
        $pass2=$this->second_password;
        $recipients = urlencode('{"'.$toAddr1.'": '.$num1.',"'.$toAddr2.'": '.$num2.'}');
        $url="http://localhost:3000/merchant/$guid/sendmany?password=$pass1&second_password=$pass2&recipients=$recipients&from=$fromAddr";
        $req=file_get_contents($url);
        if(!$req) die();
        $data=json_decode($req);
        return $data;
    }

}





