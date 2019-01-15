<?php
/**
 * Created by PhpStorm.
 * User: Deng
 * Date: 2019/1/13
 * Time: 23:32
 */
session_start();
$ver=$_SESSION['var_code'];
$islogin=isset($_SESSION['islogin'])?true:false;
if ($_POST['int_ver']!=$ver){
    exit("<script>alert('验证码错误')</script>") ;
}
if (!isset($islogin)or!$islogin){
    exit("<script>alert('你未登陆，请登陆后再评论');window.location.href='login.html';</script>") ;
}
$userid=$_SESSION['userid'];
$comment_con=$_POST['com_cont'];
$articleid=$_POST['article_id'];
include_once("database.php");
$sql="insert into `comment`(`userid`,`comment`,`articleid`) values('$userid','$comment_con','$articleid')";
$reslut=$con->query($sql);
if ($reslut){
    echo "<script>alert('评论成功！');self.location=document.referrer</script>";
}else{
    echo "<script>alert('插入失败'.$con->error);window.history.back();</script>";

}




