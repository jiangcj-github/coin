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
        vip int(32) NOT NULL DEFAULT 0,
        viptime VARCHAR (255),
        idcard VARCHAR (255),
        fullname VARCHAR (255),
        PRIMARY KEY(vid)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8;
");
if ($result){
    echo "user_infos created"."<br>";
}else{
    echo "user_infos created failed"."<br>";
}

//user_wallets
$result=$conn->query("
    CREATE TABLE IF NOT EXISTS user_wallets(
        vid int(32) UNIQUE NOT NULL,
        btcAddr VARCHAR(255) NOT NULL,
        btcLock double NOT NULL DEFAULT 0,
        PRIMARY KEY(vid)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8;
");
if ($result){
    echo "user_wallets created"."<br>";
}else{
    echo "user_wallets created failed"."<br>";
}

//checkCode_strict
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

//checkCode_strict2
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
 * state取值-成功交易【0-挂单,1-买家已接单,2-等待买家付款,3-等待卖家发货,4-等待收货,5-交易完成】
 * state取值-退款【0-挂单,1-买家已接单,2-等待买家付款,3-等待卖家发货,6-等待卖家退款,7-交易取消】
 * state取值-纠纷1【0-挂单,1-买家已接单,2-等待买家付款,8-交易纠纷】
 * state取值-纠纷2【0-挂单,1-买家已接单,2-等待买家付款,3-等待卖家发货,8-交易纠纷】
 * state取值-纠纷3【0-挂单,1-买家已接单,2-等待买家付款,3-等待卖家发货,6-等待卖家退款,8-交易纠纷】
 * state取值-纠纷处理1【8-交易纠纷,...,5-交易完成】
 * state取值-纠纷处理2【8-交易纠纷,...,7-交易取消】
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
        PRIMARY KEY(id)
    )ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;                                                                                                                                         
");
if ($result){
    echo "sells created"."<br>";
}else{
    echo "sells created failed"."<br>";
}

//交易过程1
/*
 * 0-卖家挂单
 * 1-买家接单
 * 2-卖家接单，提供付款地址    --写入交易记录
 * 3-买家确认付款         --30分钟未标记，自动取消交易
 * 4-卖家确认收款         --确认则继续，失败则进入交易过程2
 * 5-卖家确认发货
 * 6-买家确认收货
 * 7-买家评价
 */

//交易记录
//从买家付款开始写入交易记录
/*
 * state取值-成功交易【0-卖家接单,2-等待买家付款,3-等待卖家发货,4-等待收货,5-交易完成】
 * state取值-退款【0-挂单,1-买家已接单,2-等待买家付款,3-等待卖家发货,6-等待卖家退款,7-交易取消】
 * state取值-纠纷1【0-挂单,1-买家已接单,2-等待买家付款,8-交易纠纷】
 * state取值-纠纷2【0-挂单,1-买家已接单,2-等待买家付款,3-等待卖家发货,8-交易纠纷】
 * state取值-纠纷3【0-挂单,1-买家已接单,2-等待买家付款,3-等待卖家发货,6-等待卖家退款,8-交易纠纷】
 * state取值-纠纷处理1【8-交易纠纷,...,5-交易完成】
 * state取值-纠纷处理2【8-交易纠纷,...,7-交易取消】
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
        time VARCHAR (255) NOT NULL,
        info VARCHAR (255),
        state VARCHAR (255) NOT NULL,
        PRIMARY KEY(id)
    )ENGINE=InnoDB AUTO_INCREMENT=10000 DEFAULT CHARSET=utf8;                                                                                                                                         
");
if ($result){
    echo "txs created"."<br>";
}else{
    echo "txs created failed"."<br>";
}

//纠纷记录
$result=$conn->query("
    CREATE TABLE IF NOT EXISTS  issues(
        id int(32) UNIQUE NOT NULL AUTO_INCREMENT,
        vid int(32) NOT NULL,
        num int(32) NOT NULL DEFAULT 0,
        PRIMARY KEY(id)
    )ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;                                                                                                                                         
");
if ($result){
    echo "issues created"."<br>";
}else{
    echo "issues created failed"."<br>";
}

//用户评价
//每次结束一个交易都会产生一次评价
$result=$conn->query("
    CREATE TABLE IF NOT EXISTS  issues(
        id int(32) UNIQUE NOT NULL AUTO_INCREMENT,
        vid int(32) NOT NULL,
        num int(32) NOT NULL DEFAULT 0,
        PRIMARY KEY(id)
    )ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;                                                                                                                                         
");
if ($result){
    echo "issues created"."<br>";
}else{
    echo "issues created failed"."<br>";
}



