<?php

class btc{
    //
    private $guid="8f074def-2254-4cd1-bb81-705a44cf34f6";
    private $main_password="tbk_bit_2017";
    private $second_password="20090928jcj";
    private $api_code="taobike";

    function checkAddr($addr){
        $url = "http://localhost:3000/merchant/$this->guid/address_balance?password=$this->main_password&address=$addr";
        $data=json_decode(file_get_contents($url));
        return $data->balance;
    }

    function gererateAddr($label){
        $url = "http://localhost:3000/merchant/$this->guid/new_address?password=$this->main_password&label=$label";
        $data=json_decode(file_get_contents($url));
        return $data->address;
    }

    function pay($fromAddr,$toAddr,$num){
        $num=$num*100000000;
        $url="http://localhost:3000/merchant/$this->guid/payment?password=$this->main_password&second_password=$this->second_password&to=$toAddr&amount=$num&from=$fromAddr";
        $data=json_decode(file_get_contents($url));
        return $data;
    }

}





