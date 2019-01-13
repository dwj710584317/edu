<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文章详情</title>

    <link type="text/css" rel="stylesheet" href="css/menu.css">
    <link type="text/css" rel="stylesheet" href="css/main_article">
    <!--    <link type="text/css" rel="stylesheet" href="css/regist.css">-->

    <style type="text/css" rel="stylesheet">
        .detail_content {
            width: 1000px;
            margin: 20px auto;
            overflow: hidden;
            background-color: white;
            padding: 30px;
            border-top: 2px solid #e2b709;
        }

        .detail_title {
            text-align: center;
            font-size: 28px:;
        }

        .detail_info {
            margin-top: 45px;
            color: grey;
        }

        .detail_info img {
            width: 22px;
            height: 22px;
            vertical-align: middle;
        }

        .rel {
            border-left: 2px solid #e2b709;
            width: 100%;
            overflow: hidden;
            margin-top: 20px;
            padding-left: 10px;
            color: grey;
        }
        .detail_body{
            margin-top: 10px;
        }

        .comment_p{
            width: 1000px;
            overflow: hidden;
            margin: 0 auto;
            margin-top: 20px;
            font-size: 20px;
            padding-left: 10px;
        }
        .comment {
            padding: 30px;
            margin-top: 10px;
            width: 1000px;
            margin: 0 auto;

            background-color: white;
        }
        .comment_cont{
            width: 100%;
            margin: 0 auto;
            margin-top: 30px;
        }

        .commnet_left{
            float: left;
            width: 43px;

        }
        .comment_right{
            float: right;
            width: 700px;
        }

        .comment_right textarea,.comment_right input{
            border: 1px solid black;
        }
        #inp_com{
            width: 110px;
            height: 40px;
            margin-left: 580px;
            background-color: #65b5ff;
            color: white;
        }
    </style>


</head>
<body>

<?php
include_once("head.php");
?>
<div class="detail_content">
    <?php include_once("database.php");
    $sql = "select * from `article` where `id`='{$_GET['id']}'";
    $result = $con->query($sql);
    if (!$result) {
        exit("请求错误");
    }
    $arr = mysqli_fetch_array($result); ?>
    <p class="detail_title"><?php echo $arr['title'] ?></p>
    <p class="detail_info">
        <img src="img/58170f99f2430105.png"/><span> <?php echo $arr['user'] ?></span>
        <img src="img/58170fbda3f34844.png"/><span> <?php echo $arr['create_time'] ?> </span>
    </p>
    <p class="rel">简介</p>
    <p class="detail_body"><?php echo $arr['body'] ?></p>
</div>

<p class="comment_p"><img src="img/5818330b1305a607.png">评论</p>

<div class="comment">
    <div class="comment_cont">
        <div class="commnet_left">
            <p>
                <img src="img/58170f99f2430105.png"><br>
                <p style="text-align: center">网友</p>
            </p>
        </div>
        <div class="comment_right">
            <form method="POST" action="comment.php">
                <textarea name="com_cont" rows="5" cols="80" placeholder="发表评论"></textarea>
                <input name="int_ver" type="text" placeholder="请输入验证码">
                <?php $rand=rand(); echo "<img src='verification.php?r=$rand'>" ?>
                <br>
                <input name="inp_com" type="submit" value="发布评论">
            </form>

        </div>
    </div>
</div>

</body>
</html>