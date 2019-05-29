<?php
require_once('connect.php');
$username = @$_POST['username'];
$filename = @$_POST['filename'];
$auth = @$_POST['auth'];

$con=mysqli_connect("localhost","root","root","user");
$sql = "update `user` set $filename = $auth WHERE username = $username";
mysql_query($sql);
header('Location: root.php');
die("修改成功!\n");

?>