<?php
/**
 * Created by PhpStorm.
 * User: Deng
 * Date: 2019/1/13
 * Time: 23:32
 */
session_start();
$ver=$_SESSION['var_code'];
if ($_POST['int_ver']!=$ver){
    echo "<script>alert('验证码错误')</script>";
}
session_destroy();

