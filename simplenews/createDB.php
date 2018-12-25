<?php
/**
 * 创建数据库
 */

$loaclhost="localhost";
$username="root";
$password="121212";
$cont=mysqli_connect($loaclhost,$username,$password);
if (!$cont){
    die($cont->error);
}
/*
 * 创建数据库表
 *
 *

    $sql="CREATE DATABASE smiple_news ";

    if ($cont->query($sql)){
        echo "数据库创建成功！";
    }else{
        echo "数据库创建失败！".$cont->error;
    }
    $cont->close();
 */

/*
 * 创建表格
 *
 *

       $cont->select_db("smiple_news");
    $sql = "CREATE TABLE news(
            `id`  int(11) NOT NULL AUTO_INCREMENT ,
            PRIMARY KEY (`id`)
            )
            ENGINE=InnoDB
            DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
    ";

    if ($cont->query($sql)){
        echo "创建表格成功!";
    }else{
        echo "创建表格失败".$cont->error;
    }
    $cont->close();
 */


$cont->select_db("smiple_news");
$sql = "CREATE TABLE news(
           id int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
             title varchar(100) NOT NULL,
             author varchar(20) NOT NULL,
             content text NOT NULL,
             created_at datetime NOT NULL
            )
            ENGINE=InnoDB
            DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
    ";

if ($cont->query($sql)){
    echo "创建表格成功!";
}else{
    echo "创建表格失败".$cont->error;
}
$cont->close();

