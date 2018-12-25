<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        span {
            display: inline-block;
            float: left;
            width: 50px;
        }

        input[type="submit"] {
            margin-left: 10%;
        }
    </style>
</head>
<body bgcolor="#ccc">
<?php
$con = mysqli_connect("localhost", "root", "121212", "smiple_news");
if (!$con) {
    die($con->error);
}
$id=isset($_GET['id'])?$_GET['id']:"";
$title=isset($_POST['title'])?$_POST['title']:"";
$author=isset($_POST['author'])?$_POST['author']:"";
$content=isset($_POST['content'])?$_POST['content']:"";
$updated_at=isset($_POST['updated_at'])?$_POST['updated_at']:"";
$sql="SELECT id,title,author,content from news where id = '$id'";
$result=$con->query($sql);
$arr=mysqli_fetch_array($result);
?>

<form name="article" method="post" action="update.php" style="margin:5px 500px;">
    <h1>新闻修改页</h1>
    <input type="hidden" name="id" value="<?php echo $arr['id']?>"/><br/>
    标 题:<input type="text" name="title" value="<?php echo $arr['title']?>"/><br/><br/>
    作 者:<input type="text" name="author" value="<?php echo $arr['author']?>"/><br/><br/>
    <span>内 容:</span>
    <textarea cols=30 rows=5 name="content"><?php echo $arr['content']?></textarea><br/><br/>
    <input type="submit" value="修改新闻"/>
</form>


</body>
</html>






