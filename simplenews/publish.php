<?php
/**
 * Created by PhpStorm.
 * User: Deng
 * Date: 2018/12/24
 * Time: 21:47
 */

date_default_timezone_set('Asia/Shanghai');

$loaclhost="localhost";
$username="root";
$password="121212";
$dbname="smiple_news";
$cont=mysqli_connect($loaclhost,$username,$password,$dbname);
if (!$cont){
    die($cont->error);
}

$title=isset($_POST['title'])?$_POST['title']:" ";
$author=isset($_POST['author'])?$_POST['author']:" ";
$content=isset($_POST['content'])?$_POST['content']:" ";
$creadted_at=date("Y-m-d H:i:s");
$updated_at=date("Y-m-d H:i:s");


$sql = "INSERT INTO news(`title`,`author`,`content`,`created_at`,`updated_at`) VALUES ('$title','$author','$content','$creadted_at','$updated_at')";
if ($cont->query($sql)){
    echo "插入成功！<script>window.location.replace()</script>";
}else{
    echo "插入失败！".$cont->error;
}
$cont->close();
