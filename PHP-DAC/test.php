<?php
require_once('connect.php');
$con=mysqli_connect("localhost","root","root","user");
if (mysqli_connect_errno($con))
{
    echo "连接 MySQL 失败: " . mysqli_connect_error();
}
$num = mysqli_query($con,"select * from user ");
$row=mysqli_fetch_all($num,MYSQLI_ASSOC);
?>