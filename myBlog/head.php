<div class="top">
    <div class="menu">
        <ul>
            <li><img src="img/5816f7b0056da728.png"/></li>
            <li><a href="index.php"> 首页</a></li>
            <li><a href="">科技资讯</a></li>
            <li><a href="">心情随笔</a></li>
            <li><a href="">资源收藏</a></li>
            <li><a href="">图文图片</a></li>
            <li><a href="">留言板</a></li>
            <?php
            $islogin = isset($_COOKIE['username']);
            if ($islogin) {
                echo "<li class='mi'><a href='#'>欢迎回来：</a><a href='#'>{$_COOKIE['username']}</a></li>";
            } else {
                echo "<li class='mi' ><a href='login.html'>登陆</a>/<a href='regist.html'>注册</a></li>";
            }
            ?>
        </ul>
    </div>
</div>