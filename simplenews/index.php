<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>新闻发布页面</title>
    <style type="text/css">
        span{display:inline-block; float: left; width: 55px}
        input[type="submit"]{margin-left: 30%;}
    </style>
</head>
<body bgcolor="#ccc">
<form name="article" method="post" action="publish.php" style="">
    <h3 style="margin-left: 60px;">新闻发布页面</h3>
    标 题：<input type="text" name="title" style="width:200px"/>
    <br/><br/>
    作 者: <input type="text" name="author" style="width:200px"/>
    <br/><br/>
    <span>内 容:</span>
    <textarea cols=35 rows=8 name="content"></textarea><br/><br/>
    <input type="submit" value="发布新闻"/>
</form>
</body>
</html>