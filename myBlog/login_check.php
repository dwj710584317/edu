<?php
/**
 * 验证登陆状态
 */

//判断post 是否为登陆

if (isset($_POST['user_name'])){
    //获取post中的信息
    $userName=$_POST['user_name'];
    $userPasswd=$_POST['user_passwd'];
    include_once("database.php");

    $sql="select * from `user_info` where `user`='$userName' and `password`='$userPasswd'" ;
    $reslut=$con->query($sql);
    $nub=mysqli_num_rows($reslut);
    if ($nub==1){
        session_start();
        echo "1";
        setcookie("username",$userName);

        $_SESSION['islogin']=true;
        $_SESSION['userid']=mysqli_fetch_array($reslut)['id'];
    }else{
//        echo "账号或密码错误，请检查:".$con->error;
        echo "2";
    }
    $con->close();
}
//else{
//    echo('请求错误，请检查！');
//}



