<?php
/**
 * Created by PhpStorm.
 * User: Deng
 * Date: 2018/12/24
 * Time: 22:49
 */


$loaclhost="localhost";
$username="root";
$password="121212";
$cont=mysqli_connect($loaclhost,$username,$password,"smiple_news");
$cont->set_charset("utf8");
if (!$cont){
    die($cont->error);
}


//
//$page=isset($_GET['page'])?$_GET['page']:1;
//$limitNews = 3; //每页显示新闻数量
//$countNews = 0; //总共有多少条新闻
//$countPage = 0; //一共有多少页数
//
//$limitFrom = ($page - 1) * $limitNews;//从第几条数据开始读记录
////每页显示3个
////page = l limit 0
////page = 2 limit 3
////page = 3 limit 6
//
//$sql="SELECT * FROM news";
//$sqlCount="SELECT COUNT(*) FROM news";
//$retQuery=$cont->query($sqlCount);
//$retCount=mysqli_fetch_array($retQuery);
//$count = $retCount[0]?$retCount[0]:0; //判断获取的新闻数量
//$countNews = $count;
//$countPage = $countNews%$limitNews; //求余数获取分页数量能否被除尽
//
//if(($countPage) > 0) { //获取的页数有余
//    $countPage = ceil($countNews/$limitNews); // ceil() 函数向上舍入为最接近的整数,除不尽则取整数+1页, 10个新闻每个页面显示3个，成3个页面，剩余1个成1个页面
//} else {
//    $countPage = $countNews/$limitNews;
//}
//
//$prev = ($page - 1 <= 0 )?1:$page-1; //上一页
//$next = ($page + 1 > $countPage)?$countPage:$page+1; //下一页
//
//$result = $cont->query($sql);
//
//?>
<!---->
<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <title>page</title>-->
<!--</head>-->
<!--<body>-->
<!--    <div>-->
<!--        <a href="?page=--><?php //echo $prev; ?><!-- ">上一页</a>-->
<!--        --><?php
//            for ($i=1;$i<=$countPage;$i++):?>
<!--                <a href="?page=--><?php //echo $i;?><!--">--><?php //echo $i;?><!--</a>-->
<!--            --><?php //endfor;?>
<!--        <a href="?page=--><?php //echo $next;?><!--">|下一页</a>-->
<!--    </div>-->

<?php
$sql="SELECT * FROM news";
$ressql=$cont->query($sql);

                                            //分页
$page=isset($_GET['page'])?$_GET['page']:1;
$limitNews = 3; //每页显示新闻数量
$countNews = 0; //总共有多少条新闻
$countPage = 0; //一共有多少页数
$limitFrom = ($page - 1) * $limitNews;//从第几条数据开始读记录
//每页显示3个
//page = l limit 0
//page = 2 limit 3
//page = 3 limit 6
$sqlCount="SELECT COUNT(*) FROM news";
$retQuery=$cont->query($sqlCount);
$retCount=mysqli_fetch_array($retQuery);
$count = $retCount[0]?$retCount[0]:0; //判断获取的新闻数量
$countNews = $count;
$countPage = $countNews%$limitNews; //求余数获取分页数量能否被除尽

if(($countPage) > 0) { //获取的页数有余
    $countPage = ceil($countNews/$limitNews); // ceil() 函数向上舍入为最接近的整数,除不尽则取整数+1页, 10个新闻每个页面显示3个，成3个页面，剩余1个成1个页面
} else {
    $countPage = $countNews/$limitNews;
}

$prev = ($page - 1 <= 0 )?1:$page-1; //上一页
$next = ($page + 1 > $countPage)?$countPage:$page+1; //下一页


?>





    <form method="get" action="" style="margin:10px;">
        <input type="text" name="keyword" value=""/>
        <input type="submit" value="搜索"/>
    </form>
    <table cellspacing="0" cellpadding="0" align="center" bgcolor="#ccc">
        <tr>
            <th>编号</th>
            <th>文章标题</th>
            <th>文章作者</th>
            <th>文章内容</th>
            <th>发布时间</th>
            <th>编辑文章</th>
        </tr>
        <!--    执行一次，指针移动到下一行！-->
        <?php while ($arr=mysqli_fetch_array($ressql)):?>
        <tr>
            <td align="center" style="border:1px solid #000; width: 8%;"><?php echo $arr["id"]?></td>
            <td align="center" style="border:1px solid #000; width: 10%;"><?php echo $arr["title"]?></td>
            <td align="center" style="border:1px solid #000; width: 10%;"><?php echo $arr["author"]?></td>
            <td align="center" style="border:1px solid #000; width: 15%;"><?php echo $arr["content"]?></td>
            <td align="center" style="border:1px solid #000; width: 10%;"><?php echo $arr["created_at"]?></td>
            <td align="center" style="border:1px solid #000; width: 13%;">
                <a href="edit.php?id=<?php echo $arr['id']?>"><font color="red">修改</font></a>
                <a href="delete.php?id=<?php echo $arr['id']?>"><font color="red">删除</font></a>
            </td>
        </tr>
        <?php endwhile;?>

    </table>
    <div style="margin-left: 40px;">
        <?php echo "共 $countPage 页 |查到 $countNews 条记录| 当前第 $page 页 |"?>


            <div>
                <a href="?page=<?php echo $prev; ?> ">上一页</a>
                <?php
                    for ($i=1;$i<=$countPage;$i++):?>
                        <a href="?page=<?php echo $i;?>"><?php echo $i;?></a>
                    <?php endfor;?>
                <a href="?page=<?php echo $next;?>">|下一页</a>
            </div>


    </div>


</body>
</html>



