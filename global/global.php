<?php
/**
 *  相关配置
 */

//error_reporting(0);

/*调试*/
error_reporting(E_ALL);
ini_set("display_errors","on");

/**
 * mysql配置
 */
extension_loaded("mysqli");

$mysql=array(
    "host"=>"localhost",
    "user"=>"root",
    "password"=>"root",
    "database"=>"manhua"
);

/**
 * 时间设置
 */
date_default_timezone_set("PRC");

/**
 * 返回json
 */
function die_json($data){
    die(json_encode($data));
}
