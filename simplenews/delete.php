<?php
/**
 * Created by PhpStorm.
 * User: Deng
 * Date: 2018/12/25
 * Time: 21:24
 */

header("content-type:text/html;charset=utf8");
$con=mysqli_connect("localhost","root","121212","smiple_news");
if (!$con){
    die($con->error);
}

$get_id=$_GET['id'];


$delsql="DELETE FROM news WHERE id='$get_id'";
$reslut=mysqli_query($con,$delsql);
if ($reslut){
    echo "<script>alert('删除成功');window.location.href=('page.php')</script>";
}else{
    echo "<script>alert('删除失败');window.location.href=('page.php')</script>";
}
