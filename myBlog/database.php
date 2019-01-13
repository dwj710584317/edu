<?php
/**
 * Created by PhpStorm.
 * User: Deng
 * Date: 2019/1/10
 * Time: 20:55
 */

$host='localhost';
$user='root';
$passwd='121212';
$dbname='userdb';
$userdb='user_info';
//设置警告级别
error_reporting(E_ALL);
$con=mysqli_connect($host,$user,$passwd,$dbname);
if (!$con){
    exit('数据库连接失败，请检查:'.$con->error);
}
$con->set_charset('UTF8');