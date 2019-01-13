<?php
/**
 * 验证码的制作
 * User: Deng
 * Date: 2018/12/16
 * Time: 19:21
 */
//设置报头
header('Content-Type:image/jpeg;');
//设置背景
$hight=15;
$width=60;
//创建画布
$img=imagecreatetruecolor($width,$hight);
//分配颜色
$white=imagecolorallocate($img,0xff,0xff,0xff);
//设置验证码的值
imageFill($img,0,0,$white);

//
$chars='0123456789';
//返回长度
$chars_len=strlen($chars);
$code_len=4;//验证码长度
$code='';
for ($i=0;$i<$code_len;++$i){
    //0-9取4个随机
    $rand=mt_rand(0,$chars_len-1);
    $code.=$rand;  //php中.代表连接
}
//存入session
session_start();
$_SESSION['var_code']=$code;
//随机分配字符颜色
$_start_color=imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
////计算字符串的居中
////字符串大小
$font=5;
//画布大小
////画布尺寸
$img_w=imagesx($img);
$img_h=imagesy($img);
//字体尺寸
$font_w=imagefontwidth($font);
$font_h=imagefontheight($font);
//字符串的尺寸
$code_w=$font_w*$code_len;
$code_h=$font_h;
$x=($img_w-$code_w)/2;
$y=($img_h-$code_h)/2;
//输出验证码
imagestring($img,$font,$x,$y,$code,$_start_color);
//输出
//$img_path="img/img_".rand();
imagejpeg($img);
//$file=file_get_contents($img_path);
//echo $img_path;
imagedestroy($img);
?>
