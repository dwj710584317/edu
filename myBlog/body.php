<div class="content">
    <ul>

        <?php include_once("database.php");
        $sql = "select * from `article`";
        $result = $con->query($sql);
        if (empty($result)) {
            exit("查询错误，请检查" . mysqli_error());
        }
        while ($arr = mysqli_fetch_array($result)): ?>
            <li>
                <div class="content_left">
                    <p><?php echo "<a href='articledetail.php?id={$arr['id']}' class='title'> {$arr['title'] }"?></a></p>
                    <p style="margin: 20px 10px 0px 0px">
                        <?php echo $arr['body'] ?></p>
                    <p style="margin-top: 90px">
                        <img src="img/58170f99f2430105.png"/><span>  <?php echo $arr['user'] ?></span>
                        <img src="img/58170fbda3f34844.png"/><span>  <?php echo $arr['create_time'] ?></span>
                    </p>

                </div>
                <div class="content_right">
                    <img src="img/58170bc487acc779.jpg"/>
                </div>
            </li>
        <?php endwhile; ?>


    </ul>

</div>