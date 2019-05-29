<?php
$con=mysqli_connect("localhost","root","root","user");
if (mysqli_connect_errno($con))
{
    echo "连接 MySQL 失败: " . mysqli_connect_error();
}
$num = mysqli_query($con,"select * from userinfo ");
$row=mysqli_fetch_all($num,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/semantic.min.css">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/semantic.min.js"></script>
</head>
<body>
<div class="ui top grid container">
    <div class="row"></div>
    <div class="row">
        <div class="sixteen wide column">
            <div class="ui very padded segment">
                <div class="ui two column grid">
                    <div class="column">
                        <div class="ui padded blue segment">
                            <table class="ui celled unstackable table">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>username</th>
                                    <th>password</th>
                                    <th>phone</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($row as $num => $info) { ?>
                                    <tr>
                                        <td data-label="id">
                                            <?= $num+1 ?>
                                        </td>
                                        <td data-label="username">
                                            <?= $info["username"]  ?>
                                        </td>
                                        <td data-label="password">
                                            <?= $info["password"]   ?>
                                        </td>
                                        <td data-label="phone">
                                            <?= $info["phone"]   ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>