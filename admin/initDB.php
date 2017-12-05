<?php
require_once("../global/config.php");
include("checkAdmin.php");

$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
if($conn->connect_error){
    die("数据库连接错误");
}
$conn->set_charset("utf8");

//users
$result=$conn->query("
    CREATE TABLE IF NOT EXISTS  users(
        id int(32) UNIQUE NOT NULL AUTO_INCREMENT,
        nick VARCHAR (255) UNIQUE NOT NULL,
        email VARCHAR (255) UNIQUE NOT NULL,
        password VARCHAR (255) NOT NULL,
        time VARCHAR (255) NOT NULL,
        PRIMARY KEY(id)
    )ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;
");
if ($result){
    echo "users created"."<br>";
}else{
    echo "users created failed"."<br>";
}

//user_infos
$result=$conn->query("
    CREATE TABLE IF NOT EXISTS user_infos(
        vid int(32) UNIQUE NOT NULL,
        sex VARCHAR (255),
        age int(32),
        province VARCHAR (255),
        city VARCHAR (255),
        qq VARCHAR (255),
        wx VARCHAR (255),
        phone VARCHAR (255),
        idcard VARCHAR (255),
        fullname VARCHAR (255),
        ac_pass VARCHAR (255),
        ispub int(32) NOT NULL DEFAULT 1,
        ispub2 int(32) NOT NULL DEFAULT 0,
        PRIMARY KEY(vid)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8;
");
if ($result){
    echo "user_infos created"."<br>";
}else{
    echo "user_infos created failed"."<br>";
}

//user_wallets_btc
$result=$conn->query("
    CREATE TABLE IF NOT EXISTS user_wallets_btc(
        vid int(32) UNIQUE NOT NULL,
        xpub VARCHAR(255) NOT NULL,
        btcAddr VARCHAR(255) NOT NULL,
        btcNum double NOT NULL DEFAULT 0,
        btcLock double NOT NULL DEFAULT 0,
        PRIMARY KEY(vid)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8;
");
if ($result){
    echo "user_wallets_btc created"."<br>";
}else{
    echo "user_wallets_btc created failed"."<br>";
}

//checkCode_strict 注册邮箱验证
$result=$conn->query("
    CREATE TABLE IF NOT EXISTS checkCode_strict(
        email VARCHAR(255) NOT NULL,
        sendCode VARCHAR(255) NOT NULL,
        PRIMARY KEY(email)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8;
");
if ($result){
    echo "checkCode_strict created"."<br>";
}else{
    echo "checkCode_strict created failed"."<br>";
}

//checkCode_strict2 验证手机
$result=$conn->query("
    CREATE TABLE IF NOT EXISTS checkCode_strict2(
        vid int(32) NOT NULL,
        sendCode VARCHAR(255) NOT NULL,
        num int(32) NOT NULL DEFAULT 0,
        PRIMARY KEY(vid)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8;
");
if ($result){
    echo "checkCode_strict2 created"."<br>";
}else{
    echo "checkCode_strict2 created failed"."<br>";
}

//checkCode_strict3 转出
$result=$conn->query("
    CREATE TABLE IF NOT EXISTS checkCode_strict3(
        vid int(32) NOT NULL,
        sendCode VARCHAR(255) NOT NULL,
        num int(32) NOT NULL DEFAULT 0,
        PRIMARY KEY(vid)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8;
");
if ($result){
    echo "checkCode_strict3 created"."<br>";
}else{
    echo "checkCode_strict3 created failed"."<br>";
}

//checkCode_strict4 重置资金密码
$result=$conn->query("
    CREATE TABLE IF NOT EXISTS checkCode_strict4(
        vid int(32) NOT NULL,
        sendCode VARCHAR(255) NOT NULL,
        num int(32) NOT NULL DEFAULT 0,
        PRIMARY KEY(vid)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8;
");
if ($result){
    echo "checkCode_strict4 created"."<br>";
}else{
    echo "checkCode_strict4 created failed"."<br>";
}

//ads
//flag取值[0:买入，1:卖出]
$result=$conn->query("
    CREATE TABLE IF NOT EXISTS ads(
        id int(32) UNIQUE NOT NULL AUTO_INCREMENT,
        vid int(32) NOT NULL,
        nick VARCHAR(255) NOT NULL,
        flag int(32) NOT NULL,
        coin VARCHAR(255) NOT NULL,
        price double NOT NULL,
        method VARCHAR(255) NOT NULL,
        maxNum double NOT NULL DEFAULT 100,
        minNum double NOT NULL DEFAULT 0,
        remake VARCHAR(255),
        time VARCHAR(255) NOT NULL,
        PRIMARY KEY(id)
    )ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;                                                                                                                                         
");
if ($result){
    echo "ads created"."<br>";
}else{
    echo "ads created failed"."<br>";
}

//msgs
/**
 * state取值【0-未读,1-预览,2-已读】
 */
$result=$conn->query("
    CREATE TABLE IF NOT EXISTS msgs(
        id int(32) UNIQUE NOT NULL AUTO_INCREMENT,
        vid int(32) NOT NULL,
        title VARCHAR (255) NOT NULL,
        content VARCHAR (255) NOT NULL,
        time VARCHAR (255) NOT NULL,
        state int(32) NOT NULL DEFAULT 0,
        PRIMARY KEY(id)
    )ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;
");
if ($result){
    echo "msgs created"."<br>";
}else{
    echo "msgs created failed"."<br>";
}

//notices
$result=$conn->query("
    CREATE TABLE IF NOT EXISTS  notices(
        id int(32) UNIQUE NOT NULL AUTO_INCREMENT,
        author VARCHAR (255) NOT NULL,
        time VARCHAR (255) NOT NULL,
        title VARCHAR (255) NOT NULL,
        href VARCHAR (255) NOT NULL,
        PRIMARY KEY(id)
    )ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;
");
if ($result){
    echo "notices created"."<br>";
}else{
    echo "notices created failed"."<br>";
}

//sells
/*
 * state取值-成功交易【0-挂单,1-交易中】
 */
$result=$conn->query("
    CREATE TABLE IF NOT EXISTS  sells(
        id int(32) UNIQUE NOT NULL AUTO_INCREMENT,
        vid int(32) NOT NULL,
        nick VARCHAR (255) NOT NULL,
        coin VARCHAR (255) NOT NULL,
        price double NOT NULL,
        pay_method VARCHAR (255) NOT NULL,
        num double NOT NULL DEFAULT 100,
        time VARCHAR (255) NOT NULL,
        state int(32) NOT NULL DEFAULT 0,
        remake VARCHAR (255),
        notice int(32) NOT NULL DEFAULT 1,
        PRIMARY KEY(id)
    )ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;                                                                                                                                         
");
if ($result){
    echo "sells created"."<br>";
}else{
    echo "sells created failed"."<br>";
}

//交易记录
//从买家付款开始写入交易记录
/*
 * step取值【0-买家付款,1-卖家收款,2-买家申诉,3-已发货】
 * state取值【0-交易开始,1-交易挂起,2-交易成功,3-交易失败】
 */
$result=$conn->query("
    CREATE TABLE IF NOT EXISTS  txs(
        id int(32) UNIQUE NOT NULL AUTO_INCREMENT,
        sell_vid int(32) NOT NULL,
        buy_vid int (32) NOT NULL,
        coin VARCHAR (255) NOT NULL,
        price double NOT NULL,
        pay_method VARCHAR (255) NOT NULL,
        pay_info VARCHAR (255) NOT NULL,
        num double NOT NULL,
        start_time VARCHAR (255) NOT NULL,
        end_time VARCHAR (255) NOT NULL,
        remake VARCHAR (255),
        step int(32) NOT NULL DEFAULT 0,
        state int(32) NOT NULL DEFAULT 0,
        PRIMARY KEY(id)
    )ENGINE=InnoDB AUTO_INCREMENT=10000 DEFAULT CHARSET=utf8;                                                                                                                                         
");
if ($result){
    echo "txs created"."<br>";
}else{
    echo "txs created failed"."<br>";
}

//违规记录
$result=$conn->query("
    CREATE TABLE IF NOT EXISTS  user_tx(
        vid int(32) NOT NULL,
        wg int(32) NOT NULL DEFAULT 0,
        zan int(32) NOT NULL DEFAULT 0,
        lahei int(32) NOT NULL DEFAULT 0,
        PRIMARY KEY(vid)
    )ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;                                                                                                                                         
");
if ($result){
    echo "user_tx created"."<br>";
}else{
    echo "user_tx created failed"."<br>";
}



