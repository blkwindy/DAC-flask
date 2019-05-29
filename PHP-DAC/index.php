<?php

define('__MAIN__', true);
require_once('include/lib.php');
require_once('connect.php');

$action = @$_GET['action'];
$flash = NULL;

if ($action == 'logout') {
    unauth();
    header('Location: .');
    die('Logged out');
} else if ($action == 'login') {
    $username = @$_POST['username'];
    $password = @$_POST['password'];
    unauth();
    if (!$username) {
        $flash = 'Error: username is empty';
    }
    else if (!$password) {
        $flash = 'Error: password is empty';
    }
    else if ($username == 'root'&& $password =='root') {
        header('Location: root.php');
        die("Login seccess!\n");
    }
    else if ($username  && $password ) {
        $sql = "select * from user where username = '$username' and password='$password'";
        $result = mysql_query($sql);//执行sql
        $rows=mysql_num_rows($result);//返回一个数值
        if($rows)
        {
            $sqla = "select a_php from user where username = '$username'";
            $sqlb = "select b_php from user where username = '$username'";
            $sqlc = "select c_php from user where username = '$username'";
            $sqld = "select d_php from user where username = '$username'";
            $sqle= "select e_php from user where username = '$username'";
            $a = mysql_result(mysql_query($sqla),0);
            $b = mysql_result(mysql_query($sqlb),0);
            $c = mysql_result(mysql_query($sqlc),0);
            $d = mysql_result(mysql_query($sqld),0);
            $e = mysql_result(mysql_query($sqle),0);
            auth($username,$a,$b,$c,$d,$e);
            header('Location: .');
            die("Login seccess!\n");
        }
        
    }
    else {
        $flash = 'Error: wrong username or password';
    }
}

$sess = @session();

?><!DOCTYPE html>
<html>
<head>
    <title>DAC</title>
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
                            <div class="ui header" onclick="location.href = '';">
                                <h1>DAC</h1>
                            </div>
                        </div>
                        <div class="column">
                            <?php if ($flash) { ?>
                                <div class="ui red segment">
                                    <?= $flash ?>
                                </div>
                            <?php } ?>
                            <?php if ($sess == NULL) { ?>
                                <h3 class="ui header">
                                    Login
                                </h3>
                                <form class="ui form" method="post" action="?action=login">
                                    <div class="field">
                                        <label>Username</label>
                                        <input type="text" name="username" maxlength="10">
                                    </div>
                                    <div class="field">
                                        <label>Password</label>
                                        <input type="password" name="password" maxlength="10">
                                    </div>
                                    <script>
                                        $('input[name=username]').val(<?= json_encode(@$username) ?>);
                                        $('input[name=password]').val(<?= json_encode(@$password) ?>);
                                    </script>
                                    <button class="ui blue button" type="submit">Login</button>
                                </form>
                            <?php } else { ?>
                                <div class="ui padded blue segment">
                                    <h3 class="ui header">
                                        Hello, <?= @$sess->user ?>.
                                    </h3>
                                    <a class="ui blue button" href="profile.php">
                                        My Profile
                                    </a>
                                    <a class="ui blue button" href="?action=logout">
                                        Logout
                                    </a>
                                    <!-- <?php if ($sess->user == $username) { ?>
                                        <a class="ui green button" href="flag.php">
                                            My Flag
                                        </a>
                                    <?php } ?> -->
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
