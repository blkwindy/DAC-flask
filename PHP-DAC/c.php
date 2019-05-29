<?php
require_once('include/lib.php');

$sess = @session();
$sessUser = $sess->user;
check($sessUser, __FILE__);
?>
<html>
<head>
    <title>DAC</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/semantic.min.css">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/semantic.min.js"></script>
</head>
<body>

<body>
<h2>Flag please!</h2>
</body>
