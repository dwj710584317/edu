<?php
/**
 * 验证登陆状态
 */

//判断post 是否为登陆

if (isset($_POST['user_name'])){
    //获取post中的信息
    $userName=$_POST['user_name'];
    $userPasswd=$_POST['user_passwd'];
    $userConfirmPasswd=$_POST['user_confirm_passwd'];
    include_once("database.php");
    $sql="select * from `$userdb` where `user`='$userName'" ;
    $reslut=$con->query($sql);
    $nub=mysqli_num_rows($reslut);
    if ($nub==1){
        //如果返回存在
        echo "2";
        exit;
    }else{
        $now=date('Y-m-d H:i:s');
        $sql="insert into `$userdb`(`user`,`password`,`update`,`create`) values ('$userName','$userPasswd','$now','$now')" ;
        $reslut=$con->query($sql);
        if ($reslut){
            echo "1";
        }else{
            echo mysqli_error();
            exit;
        }
    }
    $con->close();
}
//else{
//    echo('请求错误，请检查！');
//}



