<?php
require_once("../global/global.php");
include("checkAdmin.php");

$conn = new mysqli($mysql["host"], $mysql["user"], $mysql["password"], $mysql["database"]);
if($conn->connect_error){
    die("数据库连接错误");
}
$conn->set_charset("utf8");

//sells
$result=$conn->query("
    CREATE TABLE IF NOT EXISTS  sells(
        id int(32) UNIQUE NOT NULL,
        nick VARCHAR (255) NOT NULL,
        coin int(32) NOT NULL,
        price double NOT NULL,
        pay_method VARCHAR (255) NOT NULL,
        maxNum double NOT NULL DEFAULT 100,
        minNum double NOT NULL DEFAULT 0,
        time VARCHAR (255) NOT NULL,
        PRIMARY KEY(id)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8;
");
if ($result){
    echo "sells created"."<br>";
}else{
    echo "sells created failed"."<br>";
}

//coins
$result=$conn->query("
    CREATE TABLE IF NOT EXISTS  coins(
        id int(32) UNIQUE NOT NULL,
        name VARCHAR (255) NOT NULL,
        abbr VARCHAR (255) NOT NULL,
        PRIMARY KEY(id)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8;
");
if ($result){
    echo "coins created"."<br>";
}else{
    echo "coins created failed"."<br>";
}

//buys
$result=$conn->query("
    CREATE TABLE IF NOT EXISTS  buys(
        id int(32) UNIQUE NOT NULL,
        nick VARCHAR (255) NOT NULL,
        coin int(32) NOT NULL,
        price double NOT NULL,
        pay_method VARCHAR (255) NOT NULL,
        maxNum double NOT NULL DEFAULT 100,
        minNum double NOT NULL DEFAULT 0,
        time VARCHAR (255) NOT NULL,
        PRIMARY KEY(id)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8;
");
if ($result){
    echo "buys created"."<br>";
}else{
    echo "buys created failed"."<br>";
}

//users
$result=$conn->query("
    CREATE TABLE IF NOT EXISTS  users(
        id int(32) UNIQUE NOT NULL,
        nick VARCHAR (255) UNIQUE NOT NULL,
        email VARCHAR (255) UNIQUE NOT NULL,
        phone VARCHAR (255),
        password VARCHAR (255) NOT NULL,
        vip int(32) NOT NULL DEFAULT 0,
        viptime VARCHAR (255),
        time VARCHAR (255) NOT NULL,
        PRIMARY KEY(id)
    )ENGINE=InnoDB AUTO_INCREMENT=10000 DEFAULT CHARSET=utf8;
");
if ($result){
    echo "users created"."<br>";
}else{
    echo "users created failed"."<br>";
}

//msgs
/**
 * state取值0[未读],1[已读],2[预览]
 */
$result=$conn->query("
    CREATE TABLE IF NOT EXISTS msgs(
        id int(32) UNIQUE NOT NULL,
        vid int(32) NOT NULL,
        title VARCHAR (255) NOT NULL,
        countent double NOT NULL,
        time VARCHAR (255) NOT NULL,
        state int(32) NOT NULL DEFAULT 0,
        PRIMARY KEY(id)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8;
");
if ($result){
    echo "msgs created"."<br>";
}else{
    echo "msgs created failed"."<br>";
}

//notices
$result=$conn->query("
    CREATE TABLE IF NOT EXISTS  notices(
        id int(32) UNIQUE NOT NULL,
        page VARCHAR (255) UNIQUE NOT NULL,
        PRIMARY KEY(id)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8;
");
if ($result){
    echo "notices created"."<br>";
}else{
    echo "notices created failed"."<br>";
}

//checkCode_strict
$result=$conn->query("
    CREATE TABLE IF NOT EXISTS checkCode_strict(
        email VARCHAR(255) NOT NULL,
        sendCode VARCHAR(255),
        PRIMARY KEY(email)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8;
");
if ($result){
    echo "checkCode_strict created"."<br>";
}else{
    echo "checkCode_strict created failed"."<br>";
}