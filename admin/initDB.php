<?php
require_once("../global/global.php");
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

//sells
$result=$conn->query("
    CREATE TABLE IF NOT EXISTS  sells(
        id int(32) UNIQUE NOT NULL AUTO_INCREMENT,
        nick VARCHAR (255) NOT NULL,
        coin int(32) NOT NULL,
        price double NOT NULL,
        pay_method VARCHAR (255) NOT NULL,
        maxNum double NOT NULL DEFAULT 100,
        minNum double NOT NULL DEFAULT 0,
        time VARCHAR (255) NOT NULL,
        PRIMARY KEY(id)
    )ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;                                                                                                                                         
");
if ($result){
    echo "sells created"."<br>";
}else{
    echo "sells created failed"."<br>";
}

//coins
$result=$conn->query("
    CREATE TABLE IF NOT EXISTS  coins(
        id int(32) UNIQUE NOT NULL AUTO_INCREMENT,
        name VARCHAR (255) NOT NULL,
        abbr VARCHAR (255) NOT NULL,
        PRIMARY KEY(id)
    )ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;
");
if ($result){
    echo "coins created"."<br>";
}else{
    echo "coins created failed"."<br>";
}


//msgs
/**
 * state取值0[未读],1[已读],2[预览]
 */
$result=$conn->query("
    CREATE TABLE IF NOT EXISTS msgs(
        id int(32) UNIQUE NOT NULL AUTO_INCREMENT,
        vid int(32) NOT NULL,
        title VARCHAR (255) NOT NULL,
        countent double NOT NULL,
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
        page VARCHAR (255) UNIQUE NOT NULL,
        PRIMARY KEY(id)
    )ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;
");
if ($result){
    echo "notices created"."<br>";
}else{
    echo "notices created failed"."<br>";
}

